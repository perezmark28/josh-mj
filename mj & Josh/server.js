const express = require('express');
const multer = require('multer');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

const ROOT_DIR = __dirname;
const UPLOAD_DIR = path.join(ROOT_DIR, 'uploads');
const DATA_FILE = path.join(ROOT_DIR, 'photos.json');

// Ensure uploads directory exists
if (!fs.existsSync(UPLOAD_DIR)) {
  fs.mkdirSync(UPLOAD_DIR, { recursive: true });
}

function readPhotos() {
  try {
    const raw = fs.readFileSync(DATA_FILE, 'utf8');
    return JSON.parse(raw);
  } catch (err) {
    return [];
  }
}

function writePhotos(photos) {
  fs.writeFileSync(DATA_FILE, JSON.stringify(photos, null, 2), 'utf8');
}

// Multer storage config
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, UPLOAD_DIR);
  },
  filename: (req, file, cb) => {
    const unique = Date.now() + '-' + Math.round(Math.random() * 1e9);
    const ext = path.extname(file.originalname || '');
    cb(null, unique + ext);
  }
});

const upload = multer({ storage });

// Serve static files (your HTML/CSS/JS)
app.use(express.static(ROOT_DIR));
app.use('/uploads', express.static(UPLOAD_DIR));

// API: get all photos
app.get('/api/photos', (req, res) => {
  const photos = readPhotos();
  res.json(photos);
});

// API: upload photos
app.post('/api/photos', upload.array('photos'), (req, res) => {
  const photos = readPhotos();
  const files = req.files || [];

  const newPhotos = files.map((file) => {
    const id = Date.now().toString() + '-' + Math.random().toString(36).slice(2, 8);
    return {
      id,
      url: '/uploads/' + file.filename,
      originalName: file.originalname,
      createdAt: new Date().toISOString()
    };
  });

  const updated = photos.concat(newPhotos);
  writePhotos(updated);

  res.status(201).json(newPhotos);
});

// API: delete photo
app.delete('/api/photos/:id', (req, res) => {
  const { id } = req.params;
  const photos = readPhotos();
  const index = photos.findIndex((p) => p.id === id);

  if (index === -1) {
    return res.status(404).json({ error: 'Photo not found' });
  }

  const [removed] = photos.splice(index, 1);
  writePhotos(photos);

  if (removed && removed.url) {
    const filePath = path.join(ROOT_DIR, removed.url.replace(/^\/+/, ''));
    fs.unlink(filePath, () => {
      // ignore errors from unlink
    });
  }

  res.json({ success: true });
});

app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});


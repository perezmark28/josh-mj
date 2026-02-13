<?php
/**
 * Handle gallery uploads: images only.
 * Persists files to uploads/ and metadata to gallery_data.json.
 */

header('Content-Type: application/json');

$baseDir = __DIR__;
$uploadDir = $baseDir . '/uploads';
$dataFile = $baseDir . '/gallery_data.json';

// Allowed: images only, no size limit
$imageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0755, true);
}

function readGalleryData($path) {
  if (!file_exists($path)) return [];
  $raw = @file_get_contents($path);
  if ($raw === false) return [];
  $data = @json_decode($raw, true);
  return is_array($data) ? $data : [];
}

function writeGalleryData($path, $data) {
  return file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX) !== false;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['error' => 'Method not allowed']);
  exit;
}

$files = $_FILES['media'] ?? null;
if (!$files || (is_array($files['error']) && count($files['error']) === 0 && $files['error'][0] === UPLOAD_ERR_NO_FILE)) {
  echo json_encode(['error' => 'No files uploaded', 'items' => []]);
  exit;
}

// Normalize to array of files
$list = [];
if (is_array($files['name'])) {
  for ($i = 0; $i < count($files['name']); $i++) {
    $list[] = [
      'name' => $files['name'][$i],
      'type' => $files['type'][$i],
      'tmp_name' => $files['tmp_name'][$i],
      'error' => $files['error'][$i],
      'size' => $files['size'][$i],
    ];
  }
} else {
  $list[] = [
    'name' => $files['name'],
    'type' => $files['type'],
    'tmp_name' => $files['tmp_name'],
    'error' => $files['error'],
    'size' => $files['size'],
  ];
}

$items = readGalleryData($dataFile);
$uploaded = [];
$errors = [];

// Limit to 12 files per upload
$maxFiles = 12;
if (count($list) > $maxFiles) {
  $errors[] = 'You can upload up to ' . $maxFiles . ' photos at a time. Extra files were ignored.';
  $list = array_slice($list, 0, $maxFiles);
}

foreach ($list as $file) {
  if ($file['error'] !== UPLOAD_ERR_OK) {
    $errors[] = $file['name'] . ': upload error ' . $file['error'];
    continue;
  }

  $isImage = in_array($file['type'], $imageTypes, true);

  if (!$isImage) {
    $errors[] = $file['name'] . ': only images are allowed (JPEG, PNG, GIF, WebP)';
    continue;
  }

  $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) ?: 'jpg';
  $safe = preg_replace('/[^a-zA-Z0-9_-]/', '', $ext) ?: 'jpg';
  $filename = date('Ymd-His') . '-' . substr(bin2hex(random_bytes(4)), 0, 8) . '.' . $safe;
  $path = $uploadDir . '/' . $filename;

  if (!move_uploaded_file($file['tmp_name'], $path)) {
    $errors[] = $file['name'] . ': failed to save';
    continue;
  }

  $id = uniqid('', true);
  $url = 'uploads/' . $filename;

  $items[] = [
    'id' => $id,
    'type' => 'image',
    'url' => $url,
    'originalName' => $file['name'],
    'createdAt' => date('c'),
  ];
  $uploaded[] = end($items);
}

if (!writeGalleryData($dataFile, $items)) {
  http_response_code(500);
  echo json_encode(['error' => 'Failed to save gallery index', 'uploaded' => $uploaded, 'errors' => $errors]);
  exit;
}

// Non-AJAX form submit (e.g. no JS): redirect back to gallery
$wantsJson = (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false)
  || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
if (!$wantsJson) {
  header('Location: gallery.php?uploaded=1');
  exit;
}

echo json_encode([
  'ok' => true,
  'uploaded' => $uploaded,
  'errors' => $errors,
]);

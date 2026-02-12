// Gallery photo management functionality
document.addEventListener('DOMContentLoaded', function() {
  const photoUpload = document.getElementById('photoUpload');
  const galleryGrid = document.getElementById('galleryGrid');

  // Load and display saved photos
  function loadPhotos() {
    const savedPhotos = JSON.parse(localStorage.getItem('galleryPhotos') || '[]');
    galleryGrid.innerHTML = '';

    if (savedPhotos.length === 0) {
      galleryGrid.innerHTML = '<p class="section-text" style="text-align: center; opacity: 0.6; grid-column: 1 / -1;">No photos uploaded yet. Upload your first photo above!</p>';
      return;
    }

    savedPhotos.forEach((photo, index) => {
      const galleryItem = document.createElement('div');
      galleryItem.className = 'gallery-item';
      
      const img = document.createElement('img');
      img.src = photo.data;
      img.alt = `Photo ${index + 1}`;
      
      const deleteBtn = document.createElement('button');
      deleteBtn.className = 'gallery-item-delete';
      deleteBtn.innerHTML = '×';
      deleteBtn.setAttribute('aria-label', 'Delete photo');
      deleteBtn.onclick = (e) => {
        e.stopPropagation();
        deletePhoto(index);
      };
      
      galleryItem.appendChild(img);
      galleryItem.appendChild(deleteBtn);
      
      galleryGrid.appendChild(galleryItem);
    });
  }

  // Handle photo upload
  photoUpload.addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    
    if (files.length === 0) return;

    files.forEach(file => {
      if (!file.type.startsWith('image/')) {
        alert('Please upload only image files!');
        return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        const photo = {
          data: e.target.result,
          date: new Date().toISOString()
        };
        
        savePhoto(photo);
      };
      reader.readAsDataURL(file);
    });

    // Reset input
    e.target.value = '';
  });

  function savePhoto(photo) {
    const savedPhotos = JSON.parse(localStorage.getItem('galleryPhotos') || '[]');
    savedPhotos.push(photo);
    localStorage.setItem('galleryPhotos', JSON.stringify(savedPhotos));
    
    // Reload gallery
    loadPhotos();
  }

  function deletePhoto(index) {
    if (confirm('Are you sure you want to delete this photo?')) {
      const savedPhotos = JSON.parse(localStorage.getItem('galleryPhotos') || '[]');
      savedPhotos.splice(index, 1);
      localStorage.setItem('galleryPhotos', JSON.stringify(savedPhotos));
      loadPhotos();
    }
  }

  // Load photos on page load
  loadPhotos();
});

// Gallery: load from PHP backend, upload via upload.php, photos only
document.addEventListener('DOMContentLoaded', function() {
  const galleryForm = document.getElementById('galleryForm');
  const photoUpload = document.getElementById('photoUpload');
  const galleryGrid = document.getElementById('galleryGrid');
  const apiList = 'api/gallery.php';

  function loadGallery() {
    galleryGrid.innerHTML = '<p class="section-text gallery-loading">Loading…</p>';
    fetch(apiList, { cache: 'no-store' })
      .then(function(r) { return r.json(); })
      .then(function(data) {
        const items = data.items || [];
        galleryGrid.innerHTML = '';

        if (items.length === 0) {
          galleryGrid.innerHTML = '<p class="section-text gallery-empty">No photos yet. Add some above—they’ll be saved on the server.</p>';
          return;
        }

        items.forEach(function(item) {
          const div = document.createElement('div');
          div.className = 'gallery-item';

          const img = document.createElement('img');
          img.src = item.url;
          img.alt = item.originalName || 'Photo';
          img.loading = 'lazy';
          div.appendChild(img);

          const deleteBtn = document.createElement('button');
          deleteBtn.className = 'gallery-item-delete';
          deleteBtn.innerHTML = '×';
          deleteBtn.setAttribute('aria-label', 'Delete');
          deleteBtn.onclick = function(e) {
            e.stopPropagation();
            deleteItem(item.id);
          };
          div.appendChild(deleteBtn);
          galleryGrid.appendChild(div);
        });
      })
      .catch(function() {
        galleryGrid.innerHTML = '<p class="section-text gallery-error">Could not load gallery. Check that you’re using the PHP site.</p>';
      });
  }

  function deleteItem(id) {
    if (!confirm('Remove this from the gallery?')) return;
    fetch(apiList + '?delete=' + encodeURIComponent(id))
      .then(function(r) { return r.json(); })
      .then(function(data) {
        if (data.ok) loadGallery();
        else alert(data.error || 'Delete failed');
      })
      .catch(function() { alert('Delete failed'); });
  }

  if (galleryForm && photoUpload) {
    galleryForm.addEventListener('submit', function(e) {
      e.preventDefault();
      var files = photoUpload.files;
      if (!files || files.length === 0) {
        alert('Choose one or more photos first.');
        return;
      }

      var formData = new FormData();
      for (var i = 0; i < files.length; i++) formData.append('media[]', files[i]);

      var btn = galleryForm.querySelector('.upload-btn-text');
      var origText = btn.textContent;
      btn.textContent = 'Uploading…';
      btn.disabled = true;

      fetch('upload.php', {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
        .then(function(r) { return r.json(); })
        .then(function(data) {
          if (data.ok && data.uploaded && data.uploaded.length) {
            loadGallery();
            var n = data.uploaded.length;
            if (n > 1) {
              btn.textContent = n + ' photos uploaded ✓';
              setTimeout(function() { btn.textContent = origText; }, 2500);
            }
          }
          if (data.errors && data.errors.length) alert('Some files were skipped:\n' + data.errors.join('\n'));
          if (data.error && !data.uploaded) alert(data.error);
          photoUpload.value = '';
        })
        .catch(function() { alert('Upload failed. Check file size (max 50MB) or try again.'); })
        .finally(function() {
          if (btn.textContent.indexOf('uploaded') === -1) btn.textContent = origText;
          btn.disabled = false;
        });
    });

    photoUpload.addEventListener('change', function() {
      if (photoUpload.files.length > 0) galleryForm.dispatchEvent(new Event('submit'));
    });
  }

  loadGallery();
});

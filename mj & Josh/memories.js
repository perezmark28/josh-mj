// Memory management functionality
document.addEventListener('DOMContentLoaded', function() {
  const memoryForm = document.getElementById('memoryForm');
  const memoryTextInput = document.getElementById('memoryText');
  const memoriesList = document.getElementById('memoriesList');

  // Load and display saved memories
  function loadMemories() {
    const savedMemories = JSON.parse(localStorage.getItem('memories') || '[]');
    memoriesList.innerHTML = '';

    if (savedMemories.length === 0) {
      memoriesList.innerHTML = '<p class="section-text" style="text-align: center; opacity: 0.6;">No memories saved yet. Add your first memory above!</p>';
      return;
    }

    savedMemories.forEach((memory, index) => {
      const memoryCard = document.createElement('div');
      memoryCard.className = 'memory-card';
      
      const header = document.createElement('div');
      header.className = 'memory-card-header';
      
      const title = document.createElement('h4');
      title.className = 'memory-card-title';
      title.textContent = `Memory ${index + 1}`;
      
      const date = document.createElement('span');
      date.className = 'memory-card-date';
      date.textContent = new Date(memory.date).toLocaleDateString();
      
      const deleteBtn = document.createElement('button');
      deleteBtn.className = 'delete-btn-x';
      deleteBtn.innerHTML = '×';
      deleteBtn.setAttribute('aria-label', 'Delete memory');
      deleteBtn.onclick = () => deleteMemory(index);
      
      header.appendChild(title);
      header.appendChild(date);
      header.appendChild(deleteBtn);
      
      const text = document.createElement('p');
      text.className = 'memory-card-text';
      text.textContent = memory.text;
      
      memoryCard.appendChild(header);
      memoryCard.appendChild(text);
      
      memoriesList.appendChild(memoryCard);
    });
  }

  // Save memory
  memoryForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const text = memoryTextInput.value.trim();
    
    if (!text) {
      alert('Please enter a memory text!');
      return;
    }

    const memory = {
      text: text,
      date: new Date().toISOString()
    };

    saveMemory(memory);
  });

  function saveMemory(memory) {
    const savedMemories = JSON.parse(localStorage.getItem('memories') || '[]');
    savedMemories.push(memory);
    localStorage.setItem('memories', JSON.stringify(savedMemories));
    
    // Reset form
    memoryForm.reset();
    
    // Reload memories list
    loadMemories();
    
    // Show success message
    const btn = memoryForm.querySelector('.save-btn');
    const originalText = btn.textContent;
    btn.textContent = 'Saved! ✓';
    btn.style.background = 'linear-gradient(135deg, #4caf50, #66bb6a)';
    setTimeout(() => {
      btn.textContent = originalText;
      btn.style.background = '';
    }, 2000);
  }

  function deleteMemory(index) {
    if (confirm('Are you sure you want to delete this memory?')) {
      const savedMemories = JSON.parse(localStorage.getItem('memories') || '[]');
      savedMemories.splice(index, 1);
      localStorage.setItem('memories', JSON.stringify(savedMemories));
      loadMemories();
    }
  }

  // Load memories on page load
  loadMemories();
});

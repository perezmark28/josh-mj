// Moving pink hearts in background
const heartsContainer = document.querySelector('.hearts-bg');
if (heartsContainer) {
  const heartChar = '♥';
  const heartCount = 24;
  const driftClasses = ['heart-float', 'heart-float drift-left', 'heart-float drift-right', 'heart-float rise'];

  for (let i = 0; i < heartCount; i++) {
    const heart = document.createElement('span');
    heart.className = driftClasses[i % driftClasses.length];
    heart.textContent = heartChar;
    heart.style.left = Math.random() * 100 + '%';
    heart.style.top = Math.random() * 100 + '%';
    heart.style.animationDelay = Math.random() * 5 + 's';
    heart.style.animationDuration = (6 + Math.random() * 6) + 's';
    heart.style.fontSize = (0.7 + Math.random() * 1) + 'rem';
    heartsContainer.appendChild(heart);
  }
}

// Home popup modals
const openValentinePopupBtn = document.getElementById('openValentinePopup');
const valentineModal = document.getElementById('valentineModal');
const valentineConfirmModal = document.getElementById('valentineConfirmModal');
const valentineYayModal = document.getElementById('valentineYayModal');
const valentineNoBtn = document.getElementById('valentineNoBtn');
const closeValentineConfirmBtn = document.getElementById('closeValentineConfirm');
const valentineYesButtons = document.querySelectorAll('.valentine-yes');
const valentineYayContinueBtn = document.getElementById('valentineYayContinue');

function openModal(modal) {
  if (!modal) return;
  modal.classList.add('is-open');
  modal.setAttribute('aria-hidden', 'false');
}

function closeModal(modal) {
  if (!modal) return;
  modal.classList.remove('is-open');
  modal.setAttribute('aria-hidden', 'true');
}

if (openValentinePopupBtn && valentineModal) {
  openValentinePopupBtn.addEventListener('click', function () {
    openModal(valentineModal);
  });
}

if (valentineNoBtn && valentineModal && valentineConfirmModal) {
  valentineNoBtn.addEventListener('click', function () {
    closeModal(valentineModal);
    openModal(valentineConfirmModal);
  });
}

if (closeValentineConfirmBtn && valentineConfirmModal) {
  closeValentineConfirmBtn.addEventListener('click', function () {
    closeModal(valentineConfirmModal);
  });
}

if (valentineYesButtons.length && valentineYayModal) {
  valentineYesButtons.forEach((btn) => {
    btn.addEventListener('click', function (event) {
      event.preventDefault();
      closeModal(valentineModal);
      closeModal(valentineConfirmModal);
      openModal(valentineYayModal);
    });
  });
}

if (valentineYayContinueBtn && valentineYayModal) {
  valentineYayContinueBtn.addEventListener('click', function () {
    closeModal(valentineYayModal);
    window.location.href = 'home.php';
  });
}

if (valentineModal) {
  valentineModal.addEventListener('click', function (event) {
    if (event.target === valentineModal) {
      closeModal(valentineModal);
    }
  });
}

if (valentineConfirmModal) {
  valentineConfirmModal.addEventListener('click', function (event) {
    if (event.target === valentineConfirmModal) {
      closeModal(valentineConfirmModal);
    }
  });
}

if (valentineYayModal) {
  valentineYayModal.addEventListener('click', function (event) {
    if (event.target === valentineYayModal) {
      closeModal(valentineYayModal);
    }
  });
}

// Landing PIN keypad (index.html)
const pinKeypad = document.getElementById('pinKeypad');
const pinDots = document.querySelectorAll('#pinDisplay .pin-dot');
const pinError = document.getElementById('pinError');
const CORRECT_PIN = '042525';
let currentPin = '';

function updatePinDots() {
  if (!pinDots.length) return;
  pinDots.forEach((dot, index) => {
    dot.classList.toggle('filled', index < currentPin.length);
  });
}

function resetPin(errorMessage) {
  currentPin = '';
  updatePinDots();
  if (pinError) {
    pinError.textContent = errorMessage || '';
  }
}

if (pinKeypad && pinDots.length === 6) {
  pinKeypad.addEventListener('click', (event) => {
    const btn = event.target.closest('button[data-key]');
    if (!btn) return;

    const key = btn.getAttribute('data-key');

    if (key === 'clear') {
      resetPin('');
      return;
    }

    if (key === 'back') {
      currentPin = currentPin.slice(0, -1);
      updatePinDots();
      if (pinError) pinError.textContent = '';
      return;
    }

    if (currentPin.length >= 6) return;
    currentPin += key;
    updatePinDots();

    if (currentPin.length === 6) {
      if (currentPin === CORRECT_PIN) {
        if (pinError) pinError.textContent = '';
        window.location.href = 'home.php';
      } else {
        resetPin('Wrong PIN. Try again.');
      }
    }
  });
}

// Envelope animation on message page
const envelope = document.getElementById('envelope');
const envelopeContainer = document.getElementById('envelopeContainer');

if (envelope && envelopeContainer) {
  envelope.addEventListener('click', function() {
    if (!envelope.classList.contains('opened')) {
      envelope.classList.add('opened');
      // Update the text after opening
      const sectionText = document.querySelector('.section-text');
      if (sectionText) {
        sectionText.textContent = 'A handwritten letter, just for you.';
      }
    }
  });

  // Also support touch events for mobile
  envelope.addEventListener('touchend', function(e) {
    e.preventDefault();
    if (!envelope.classList.contains('opened')) {
      envelope.classList.add('opened');
      const sectionText = document.querySelector('.section-text');
      if (sectionText) {
        sectionText.textContent = 'A handwritten letter, just for you.';
      }
    }
  });
}

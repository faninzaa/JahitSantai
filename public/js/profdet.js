// ===== Popup (modal) =====
function closeModals() {
  document.querySelectorAll('.modal').forEach(m => (m.hidden = true));
  document.body.classList.remove('modal-open');
}

document.addEventListener('click', e => {
  const opener = e.target.closest('[data-modal]');
  if (opener) {
    const modal = document.getElementById(opener.dataset.modal);
    if (modal) {
      modal.hidden = false;
      document.body.classList.add('modal-open');
    }
    return;
  }
  // klik tombol X atau area gelap di luar kotak
  if (e.target.closest('[data-close]') || e.target.classList.contains('modal')) {
    closeModals();
  }
});

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeModals();
});
import '../css/app.css';

document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('csie-menu-toggle');
  const menu = document.getElementById('csie-mobile-menu');
  const label = document.getElementById('csie-menu-label');

  if (toggle && menu) {
    toggle.addEventListener('click', () => {
      const isOpen = !menu.classList.contains('hidden');
      menu.classList.toggle('hidden');
      toggle.setAttribute('aria-expanded', String(!isOpen));
      if (label) {
        label.textContent = isOpen ? 'menu' : 'close';
      }
    });
  }
});

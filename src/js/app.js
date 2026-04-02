import '../css/app.css';
import Swiper from 'swiper';
import 'swiper/css';

document.addEventListener('DOMContentLoaded', () => {
  // Services slider
  const servicesEl = document.querySelector('.csie-services-swiper');
  if (servicesEl) {
    new Swiper(servicesEl, {
      slidesPerView: 1,
      spaceBetween: 0,
      breakpoints: {
        1024: {
          slidesPerView: 3,
          allowTouchMove: false,
        },
      },
    });
  }
  // Technologies slider
  const technologiesEl = document.querySelector('.csie-technologies-swiper');
  if (technologiesEl) {
    new Swiper(technologiesEl, {
      slidesPerView: 1,
      spaceBetween: 0,
      breakpoints: {
        1024: {
          slidesPerView: 2,
        },
      },
    });
  }

  // Mobile menu toggle
  const menuToggle = document.getElementById('csie-menu-toggle');
  const mobileMenu = document.getElementById('csie-mobile-menu');
  const menuLabel = document.getElementById('csie-menu-label');

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
      const isOpen = !mobileMenu.classList.contains('hidden');
      mobileMenu.classList.toggle('hidden');
      menuToggle.setAttribute('aria-expanded', String(!isOpen));
      if (menuLabel) {
        menuLabel.textContent = isOpen ? 'menu' : 'close';
      }
    });
  }

  // Search toggle
  const searchToggle = document.getElementById('csie-search-toggle');
  const searchPanel = document.getElementById('csie-search-panel');
  const searchInput = document.getElementById('csie-search-input');

  if (searchToggle && searchPanel) {
    searchToggle.addEventListener('click', () => {
      const isOpen = searchPanel.classList.contains('grid-rows-[1fr]');
      searchPanel.classList.toggle('grid-rows-[1fr]');
      searchToggle.setAttribute('aria-expanded', String(!isOpen));
      if (!isOpen && searchInput) {
        setTimeout(() => searchInput.focus(), 300);
      }
    });
  }

  // Submenu arrow toggles
  initSubmenuToggles();
});

function initSubmenuToggles() {
  const chevronSvg = '<svg viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5.5 5L10 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

  // Find all menu items with children inside dropdowns (level 2+)
  // Desktop: inside .csie-menu .sub-menu
  // Mobile: inside .csie-menu-mobile
  const selectors = [
    '.csie-menu .sub-menu > .menu-item-has-children',
    '.csie-menu-mobile .menu-item-has-children',
  ];

  document.querySelectorAll(selectors.join(',')).forEach((item) => {
    const link = item.querySelector(':scope > a');
    const subMenu = item.querySelector(':scope > .sub-menu');
    if (!link || !subMenu) return;

    // Create toggle button
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'csie-submenu-toggle';
    btn.setAttribute('aria-expanded', 'false');
    btn.innerHTML = chevronSvg;

    // Insert button after the link
    link.after(btn);

    // Click on arrow toggles sub-menu
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const isOpen = subMenu.classList.contains('is-open');
      subMenu.classList.toggle('is-open');
      btn.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', String(!isOpen));
    });
  });
}

import '../css/app.css';
import Swiper from 'swiper';
import { Grid, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/grid';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', () => {
  // Automation slider
  const automationEl = document.querySelector('.csie-automation');
  if (automationEl) {
    new Swiper(automationEl, {
      slidesPerView: 1.2,
      spaceBetween: -20,
      breakpoints: {
        1024: {
          slidesPerView: 4,
        },
      },
    });
  }

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
  // Company services grid slider (mobile: 3 cards per slide)
  const servicesGridEl = document.querySelector('.csie-services-grid-swiper');
  if (servicesGridEl) {
    new Swiper(servicesGridEl, {
      modules: [Pagination],
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: '.csie-services-grid-pagination',
        clickable: true,
        bulletClass: 'w-[8px] h-[8px] rounded-full bg-[#d9d9d9] cursor-pointer transition-colors',
        bulletActiveClass: '!bg-[#00b1ff]',
      },
    });
  }
  // Company expertise slider
  const expertiseEl = document.querySelector('.csie-expertise-swiper');
  if (expertiseEl) {
    new Swiper(expertiseEl, {
      modules: [Grid],
      slidesPerView: 1,
      spaceBetween: 20,
      grid: {
        rows: 2,
        fill: 'row',
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
          grid: {
            rows: 1,
            fill: 'row',
          },
          allowTouchMove: false,
        },
      },
    });
  }
  // Company profile slider
  const companyProfileEl = document.querySelector('.csie-company-profile-swiper');
  if (companyProfileEl) {
    new Swiper(companyProfileEl, {
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
  // Research directions slider
  const researchEl = document.querySelector('.csie-research-swiper');
  if (researchEl) {
    new Swiper(researchEl, {
      slidesPerView: 1,
      spaceBetween: 20,
      breakpoints: {
        1024: {
          slidesPerView: 3,
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

  // Solutions slider
  const solutionsEl = document.querySelector('.csie-solutions-swiper');
  if (solutionsEl) {
    new Swiper(solutionsEl, {
      slidesPerView: 1.2,
      spaceBetween: -20,
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: -20,
        },
      },
    });
  }

  // Experience cards slider
  const experienceEl = document.querySelector('.csie-experience-swiper');
  if (experienceEl) {
    new Swiper(experienceEl, {
      slidesPerView: 1.2,
      spaceBetween: -20,
      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 0,
          enabled: false,
        },
      },
    });
  }

  // Service research slider
  const serviceResearchEl = document.querySelector('.csie-service-research-swiper');
  if (serviceResearchEl) {
    new Swiper(serviceResearchEl, {
      slidesPerView: 1,
      spaceBetween: 10,
      breakpoints: {
        1024: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
      },
    });
  }

  // Uniqueness cards slider
  const uniquenessEl = document.querySelector('.csie-uniqueness-swiper');
  if (uniquenessEl) {
    new Swiper(uniquenessEl, {
      modules: [Grid],
      slidesPerView: 1,
      spaceBetween: 10,
      grid: {
        rows: 3,
        fill: 'row',
      },
      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
          grid: {
            rows: 2,
            fill: 'row',
          },
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

  // Vacancy accordion
  initVacancyAccordion();
});

function initVacancyAccordion() {
  document.querySelectorAll('.csie-vacancy-toggle').forEach((btn) => {
    const item = btn.closest('.csie-vacancy-item');
    const content = item.querySelector('.csie-vacancy-content');

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');

      if (isOpen) {
        // Closing: set explicit height, then animate to 0
        content.style.height = content.scrollHeight + 'px';
        content.offsetHeight;
        content.style.height = '0';
        item.classList.remove('is-open');
      } else {
        // Opening: animate from 0 to scrollHeight
        content.style.height = content.scrollHeight + 'px';
        item.classList.add('is-open');
      }
    });

    content.addEventListener('transitionend', () => {
      if (item.classList.contains('is-open')) {
        content.style.height = 'auto';
      }
    });
  });
}

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

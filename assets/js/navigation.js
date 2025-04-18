/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const siteNavigation = document.getElementById('site-navigation');
  const primaryMenu = document.getElementById('primary-menu');
  const buttonText = document.getElementById('mobile-menu-text');

  // Return early if the navigation doesn't exist.
  if (!siteNavigation) {
    return;
  }

  if (!primaryMenu) {
    return;
  }

  const dropdownBtns = primaryMenu.querySelectorAll('li > button');
  const allSubMenus = primaryMenu.querySelectorAll('ul.sub-menu');

  for (const subMenu of allSubMenus) {
    const controlBtn = subMenu.previousElementSibling.previousElementSibling;
    const controlsId = controlBtn.getAttribute('aria-controls');
    subMenu.setAttribute('id', controlsId);
  }

  for (const btn of dropdownBtns) {
    btn.addEventListener('click', function (e) {
      const activeSubMenu = e.target.nextElementSibling.nextElementSibling;
      const isExpanded = JSON.parse(btn.getAttribute('aria-expanded'));
      btn.setAttribute('aria-expanded', !isExpanded);
      activeSubMenu.classList.toggle('hidden');
    });
  }

  const button = siteNavigation.getElementsByTagName('button')[0];

  // Return early if the button doesn't exist.
  if ('undefined' === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName('ul')[0];

  // Hide menu toggle button if menu is empty and return early.
  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }

  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  }

  function menuToggle() {
    const isExpanded = JSON.parse(button.getAttribute('aria-expanded'));
    siteNavigation.classList.toggle('toggled');
    primaryMenu.classList.toggle('invisible');
    document.body.classList.toggle('overflow-hidden');
    // instagramLink.classList.toggle('hidden')

    button.setAttribute('aria-expanded', !isExpanded);

    isExpanded
      ? (buttonText.innerText = 'Menu')
      : (buttonText.innerText = 'Close');

    // if (button.getAttribute('aria-expanded') === 'true') {
    //   button.setAttribute('aria-expanded', 'false')
    //   button.innerText = 'Menu'
    // } else {
    //   button.setAttribute('aria-expanded', 'true')
    //   button.innerText = 'Close'
    // }
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener('click', menuToggle);

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener('click', function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove('toggled');
      button.setAttribute('aria-expanded', 'false');
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName('a');

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    '.menu-item-has-children > a, .page_item_has_children > a'
  );

  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    link.addEventListener('focus', toggleFocus, true);
    link.addEventListener('blur', toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event.
  for (const link of linksWithChildren) {
    link.addEventListener('touchstart', toggleFocus, false);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === 'focus' || event.type === 'blur') {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains('nav-menu')) {
        // On li elements toggle the class .focus.
        if ('li' === self.tagName.toLowerCase()) {
          self.classList.toggle('focus');
        }
        self = self.parentNode;
      }
    }

    if (event.type === 'touchstart') {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove('focus');
        }
      }
      menuItem.classList.toggle('focus');
    }
  }
})();

const header = document.querySelector('.main-header');

window.addEventListener('scroll', () => {
  const currentScroll = window.scrollY;

  if (currentScroll > 350) {
    header.classList.add('logo-scale');
  } else {
    header.classList.remove('logo-scale');
  }
});

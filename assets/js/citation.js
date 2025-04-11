/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const citation = document.querySelector('[data-type="citation"]');
  const citationBtn = document.getElementById('copy_citation');

  citationBtn?.addEventListener('click', e => {
    navigator.clipboard.write([
      new ClipboardItem({
        'text/plain': new Blob([citation.innerText], { type: 'text/plain' }),
        'text/html': new Blob([citation.innerHTML], { type: 'text/html' }),
      }),
    ]);

    // citationBtn.classList.add('copied');

    citationBtn.disabled = true;

    citationBtn.querySelector('span').innerText = 'Copied';

    if (citationBtn.disabled) {
      setTimeout(() => {
        // citationBtn.classList.remove('copied');
        citationBtn.disabled = false;
        citationBtn.querySelector('span').innerText = 'Copy citation';
      }, 5000);
    }
  });
})();

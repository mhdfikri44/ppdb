// /**
//  * UI Tooltips & Popovers
//  */

'use strict';

(function () {
    $(function () {
  $('[data-bs-toggle="tooltip"]').tooltip()
})
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });
})();

// bulma navigation/dropdowns

document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  var $navbarDropdowns = Array.prototype.slice.call(document.querySelectorAll('.navbar-item.has-dropdown'), 0);
  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });

  // Check if there are any navbar dropdowns
  if ($navbarDropdowns.length > 0) {

    // Add a click event on each of them
    $navbarDropdowns.forEach(function ($el) {
      $el.addEventListener('click', function () {
        // Toggle the class on "navbar dropdown"
        $el.classList.toggle('is-active');
      });
    });
    
  }

});

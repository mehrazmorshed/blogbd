document.addEventListener('DOMContentLoaded', function () {
    var menuToggle = document.querySelector('.menu-toggle');
    var navMenu = document.querySelector('.main-navigation .menu');

    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            var expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
            menuToggle.setAttribute('aria-expanded', !expanded);
            navMenu.classList.toggle('toggled');
        });
    }

    // Handle submenu toggling on mobile
    var submenuItems = document.querySelectorAll('.main-navigation .menu-item-has-children > a');

    submenuItems.forEach(function (submenuItem) {
        submenuItem.addEventListener('click', function (e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                var parent = submenuItem.parentElement;
                parent.classList.toggle('focus');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var toggleButton = document.querySelector('.menu-toggle');
    var menu = document.querySelector('.main-navigation ul');

    if (toggleButton) {
        toggleButton.addEventListener('click', function() {
            menu.classList.toggle('toggled');
        });
    }
});

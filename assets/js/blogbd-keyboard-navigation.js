document.addEventListener('DOMContentLoaded', function () {
    const nav = document.getElementById('site-navigation');
    const menu = nav.querySelector('.menu');
    const menuToggle = nav.querySelector('.menu-toggle');
    
    if (menu) {
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('keydown', function (e) {
                handleKeyDown(e, link);
            });
        });
    }

    function handleKeyDown(e, link) {
        const parentMenu = link.closest('ul');
        let isExpanded = false;

        if (link.nextElementSibling && link.nextElementSibling.tagName === 'UL') {
            isExpanded = link.getAttribute('aria-expanded') === 'true';
        }

        switch (e.key) {
            case 'ArrowDown':
                e.preventDefault();
                moveFocus(link, 'down');
                break;
            case 'ArrowUp':
                e.preventDefault();
                moveFocus(link, 'up');
                break;
            case 'ArrowRight':
                e.preventDefault();
                if (isExpanded) {
                    moveFocus(link.nextElementSibling.querySelector('a'), 'down');
                } else {
                    moveFocus(link.closest('li').nextElementSibling.querySelector('a'), 'down');
                }
                break;
            case 'ArrowLeft':
                e.preventDefault();
                if (parentMenu.classList.contains('sub-menu')) {
                    moveFocus(parentMenu.closest('li').querySelector('a'), 'up');
                }
                break;
            case 'Enter':
            case ' ':
                e.preventDefault();
                if (isExpanded) {
                    closeSubMenu(link);
                } else {
                    openSubMenu(link);
                }
                break;
            case 'Escape':
                e.preventDefault();
                if (parentMenu.classList.contains('sub-menu')) {
                    closeSubMenu(link.closest('ul').previousElementSibling);
                    link.closest('ul').previousElementSibling.focus();
                }
                break;
        }
    }

    function moveFocus(link, direction) {
        let newLink;
        if (direction === 'down') {
            newLink = link.closest('li').nextElementSibling ? link.closest('li').nextElementSibling.querySelector('a') : link.closest('ul').querySelector('li:first-child a');
        } else if (direction === 'up') {
            newLink = link.closest('li').previousElementSibling ? link.closest('li').previousElementSibling.querySelector('a') : link.closest('ul').querySelector('li:last-child a');
        }
        if (newLink) {
            newLink.focus();
        }
    }

    function openSubMenu(link) {
        if (link.nextElementSibling && link.nextElementSibling.tagName === 'UL') {
            link.setAttribute('aria-expanded', 'true');
            link.nextElementSibling.style.display = 'block';
            link.nextElementSibling.querySelector('a').focus();
        }
    }

    function closeSubMenu(link) {
        if (link.nextElementSibling && link.nextElementSibling.tagName === 'UL') {
            link.setAttribute('aria-expanded', 'false');
            link.nextElementSibling.style.display = 'none';
        }
    }
});

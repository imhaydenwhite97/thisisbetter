class MobileMenu {
    constructor() {
        this.init();
    }

    init() {
        const menuItems = document.querySelectorAll('.mobile-menu .menu-item');
        
        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });

        // Add active class based on current page
        this.setActiveMenuItem();
    }

    setActiveMenuItem() {
        const currentPath = window.location.pathname;
        const menuItems = document.querySelectorAll('.mobile-menu .menu-item');
        
        menuItems.forEach(item => {
            if (item.getAttribute('href') === currentPath) {
                item.classList.add('active');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new MobileMenu();
});

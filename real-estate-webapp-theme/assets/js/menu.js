class DockMenu {
    constructor() {
        this.init();
    }

    init() {
        const dockItems = document.querySelectorAll('.dock-items li');
        
        dockItems.forEach((item, index) => {
            item.addEventListener('mousemove', (e) => {
                this.applyHoverEffect(e, dockItems);
            });
        });

        document.querySelector('.mac-dock').addEventListener('mouseleave', () => {
            dockItems.forEach(item => {
                item.style.transform = 'scale(1)';
            });
        });
    }

    applyHoverEffect(e, items) {
        items.forEach(item => {
            const rect = item.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const distance = Math.sqrt(
                Math.pow(x - rect.width / 2, 2) + 
                Math.pow(y - rect.height / 2, 2)
            );
            
            const scale = Math.max(1, 1.5 - (distance / 100));
            item.style.transform = `scale(${scale})`;
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new DockMenu();
});

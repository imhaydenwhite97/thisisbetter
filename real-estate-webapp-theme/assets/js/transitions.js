document.addEventListener('DOMContentLoaded', function() {
    // Splash screen
    const splash = document.querySelector('.splash-screen');
    if (splash) {
        setTimeout(() => {
            splash.classList.add('fade-out');
        }, 2000);
    }
    
    // Page transitions
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.hostname === window.location.hostname) {
                e.preventDefault();
                document.body.classList.add('page-transition');
                setTimeout(() => {
                    window.location = this.href;
                }, 500);
            }
        });
    });
});


class PageTransitions {
    constructor() {
        this.initSplashScreen();
        this.initPageTransitions();
    }

    initSplashScreen() {
        const splash = document.querySelector('.splash-screen');
        if (splash) {
            document.body.style.overflow = 'hidden';
            
            window.addEventListener('load', () => {
                setTimeout(() => {
                    splash.classList.add('fade-out');
                    document.body.style.overflow = '';
                    
                    setTimeout(() => {
                        splash.remove();
                    }, 500);
                }, 2000);
            });
        }
    }

    initPageTransitions() {
        document.querySelectorAll('a').forEach(link => {
            if (link.hostname === window.location.hostname) {
                link.addEventListener('click', e => {
                    if (!e.ctrlKey && !e.shiftKey) {
                        e.preventDefault();
                        const target = e.currentTarget.href;
                        
                        document.body.classList.add('page-transition');
                        
                        setTimeout(() => {
                            window.location = target;
                        }, 500);
                    }
                });
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PageTransitions();
});

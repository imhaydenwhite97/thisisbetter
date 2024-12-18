class Authentication {
    constructor() {
        this.initLoginForm();
        this.initRegistrationForm();
        this.initLogoutButton();
    }

    initLoginForm() {
        const form = document.getElementById('login-form');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleLogin(form);
            });
        }
    }

    initRegistrationForm() {
        const form = document.getElementById('registration-form');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleRegistration(form);
            });
        }
    }

    initLogoutButton() {
        const logoutBtn = document.querySelector('.logout-button');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleLogout();
            });
        }
    }

    async handleLogin(form) {
        const formData = new FormData(form);
        
        try {
            const response = await fetch(ajaxurl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const data = await response.json();
            
            if (data.success) {
                window.location.href = data.data.redirect_url;
            } else {
                this.showError(data.data.message);
            }
        } catch (error) {
            this.showError('An error occurred. Please try again.');
        }
    }

    async handleRegistration(form) {
        const formData = new FormData(form);
        
        try {
            const response = await fetch(ajaxurl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const data = await response.json();
            
            if (data.success) {
                window.location.href = data.data.redirect_url;
            } else {
                this.showError(data.data.message);
            }
        } catch (error) {
            this.showError('An error occurred. Please try again.');
        }
    }

    async handleLogout() {
        try {
            const response = await fetch(ajaxurl, {
                method: 'POST',
                body: new URLSearchParams({
                    'action': 'custom_logout'
                }),
                credentials: 'same-origin'
            });

            const data = await response.json();
            
            if (data.success) {
                window.location.href = data.data.redirect_url;
            }
        } catch (error) {
            console.error('Logout failed:', error);
        }
    }

    showError(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'auth-error';
        errorDiv.textContent = message;
        
        const form = document.querySelector('.auth-form');
        form.insertBefore(errorDiv, form.firstChild);
        
        setTimeout(() => errorDiv.remove(), 5000);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new Authentication();
});

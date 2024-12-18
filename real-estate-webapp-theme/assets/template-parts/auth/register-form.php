<div class="auth-container register-container">
    <form id="registration-form" class="auth-form">
        <h2>Create Account</h2>
        
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required 
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="form-group terms-checkbox">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I agree to the Terms and Conditions</label>
        </div>

        <input type="hidden" name="action" value="custom_register">
        <?php wp_nonce_field('custom_registration', 'registration_nonce'); ?>

        <button type="submit">Create Account</button>

        <div class="auth-links">
            <span>Already have an account?</span>
            <a href="<?php echo home_url('/login'); ?>">Login</a>
        </div>

        <div class="social-login">
            <p>Or sign up with</p>
            <div class="social-login-buttons">
                <button type="button" class="social-button google-login">
                    <i class="fab fa-google"></i>
                    Continue with Google
                </button>
                <button type="button" class="social-button facebook-login">
                    <i class="fab fa-facebook"></i>
                    Continue with Facebook
                </button>
            </div>
        </div>
    </form>
</div>

<div class="auth-container login-container">
    <form id="login-form" class="auth-form">
        <h2>Login</h2>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
        <button type="submit">Login</button>
        <div class="auth-links">
            <a href="<?php echo home_url('/register'); ?>">Create Account</a>
            <a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a>
        </div>
    </form>
</div>

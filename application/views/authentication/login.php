<link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="<?php echo site_url('login/authenticate'); ?>" method="post">
            <h1>Create Account</h1>
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <button>Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="<?php echo site_url('login/authenticate'); ?>" method="post">
            <h1>Sign in</h1>
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <a href="">Forgot your password?</a>
            <button>Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url("assets/js/login.js") ?>"></script>
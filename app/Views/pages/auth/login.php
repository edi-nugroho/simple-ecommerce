<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="login-page">
        <div class="container col-6">
            <h2 class="login-title">Login</h2>
            <div class="login-card">
                <label for="">Email</label>
                <input type="text" class="login_email">

                <label for="">Password</label>
                <input type="password">

                <button type="submit">Sign In</button>

                <a href="/register">Create Account</a>
                <a href="sdsd">Forgot Password</a>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
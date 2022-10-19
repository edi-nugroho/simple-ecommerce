<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="login-page">
        <div class="container col-6">
            <h2 class="login-title">Register</h2>
            <div class="login-card">
                <label for="">Name</label>
                <input type="text">

                <label for="">Phone Number</label>
                <input type="text">

                <label for="">Email</label>
                <input type="text" class="login_email">

                <label for="">Password</label>
                <input type="password">

                <label for="">Confirm Password</label>
                <input type="password">

                <button type="submit">Register</button>

                <a href="">Create Account</a>
                <a href="sdsd">Forgot Password</a>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
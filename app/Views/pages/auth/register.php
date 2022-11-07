<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="login-page">
        <div class="container col-6">
            <h2 class="login-title">Register</h2>
            <div class="login-card">
        
                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" value="<?= old('name') ?>">
                    </div>

                    <div class="form-group">
                        <label for="username"><?=lang('Auth.username')?></label>
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control <?php if (session('errors.phone_number')) : ?>is-invalid<?php endif ?>" name="phone_number" value="<?= old('phone_number') ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="login_email form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email') ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="pass_confirm">Confirm Password</label>
                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                    </div>

                    <button type="submit">Register</button>

                    <a href="/login">Sign In</a>
                    <a href="/forgot-password">Forgot Password</a>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
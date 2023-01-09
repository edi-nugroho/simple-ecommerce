<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="container d-flex justify-content-center py-5">
        <div class="col-6">
            <h2 class="fw-bold"><?=lang('Auth.resetYourPassword')?></h2>

            <?= view('Myth\Auth\Views\_message_block') ?>

            <p><?=lang('Auth.enterCodeEmailPassword')?></p>

            <form action="<?= url_to('reset-password') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group mb-3">
                    <label for="token" class="fw-semibold mb-2"><?=lang('Auth.token')?></label>
                    <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?> rounded-0"
                            name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.token') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="fw-semibold mb-2"><?=lang('Auth.email')?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> rounded-0"
                            name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.email') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="fw-semibold mb-2"><?=lang('Auth.newPassword')?></label>
                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?> rounded-0"
                            name="password">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="pass_confirm" class="fw-semibold mb-2"><?=lang('Auth.newPasswordRepeat')?></label>
                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?> rounded-0"
                            name="pass_confirm">
                    <div class="invalid-feedback">
                        <?= session('errors.pass_confirm') ?>
                    </div>
                </div>

                <button type="submit" class="border border-0 py-2 px-3 bg-black text-white fw-bold"><?=lang('Auth.resetPassword')?></button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
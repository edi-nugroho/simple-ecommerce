<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="container d-flex justify-content-center py-5">
        <div class="col-6">

        <h2 class="fw-bold">Forgot Password</h2>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <p class="mt-4"><?=lang('Auth.enterEmailForInstructions')?></p>

        <form action="<?= url_to('forgot') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="email" class="fw-semibold mb-2"><?=lang('Auth.emailAddress')?></label>
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> rounded-0"
                        name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>

            <br>

            <button type="submit" class="border border-0 py-2 px-3 bg-black text-white fw-bold"><?=lang('Auth.sendInstructions')?></button>
        </form>
        </div>
    </div>
<?= $this->endSection() ?>
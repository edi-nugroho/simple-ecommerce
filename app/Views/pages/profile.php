<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="row my-4">
            <h3 class="fw-bold">Profile</h3>
            <div class="profile mt-2">
                <div class="profile-picture">
                    <img src="/img/profile/<?= user()->user_image; ?>" alt="">
                </div>
                <div class="profile-detail">
                    <p>Name : <?= user()->name; ?></p>
                    <p>Email : <?= user()->email; ?></p>
                    <p>Phone Number : <?= user()->phone_number; ?></p>
                    <p>Address : </p>
                    <div class="address">
                        <p><?= user()->address; ?></p>
                    </div>
                </div>
            </div>
            <div class="profile-button mt-4 mb-4">
                <a href="">Pesanan Saya</a>
                <a href="/updateProfile/<?= user()->username; ?>">Update Profile</a>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
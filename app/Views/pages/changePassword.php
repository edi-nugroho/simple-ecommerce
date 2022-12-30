<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
    <div class="container my-5 d-flex flex-column align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold mb-4">Change Password</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Current Password</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">New Password</label>
                <input type="text" class="form-control" id="name">
            </div>
            <button type="submit" class="primary px-3 py-2 fw-bold border border-0">Update</button>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h3 class="form-header mb-3">Add New Staff</h3>

        <form action="/staff/save" method="POST" enctype="multipart/form-data">
            <!-- Input Data -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control <?= ($validation->hasError('name')) ? "is-invalid" : ''; ?>" name="name" value="<?= old('name'); ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('name'); ?>
		      	</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? "is-invalid" : ''; ?>" name="username" value="<?= old('username'); ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('username'); ?>
		      	</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? "is-invalid" : ''; ?>" name="email" value="<?= old('email'); ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('email'); ?>
		      	</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control <?= ($validation->hasError('phone_number')) ? "is-invalid" : ''; ?>" name="phone_number" value="<?= old('phone_number'); ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('phone_number'); ?>
		      	</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control <?= ($validation->hasError('password')) ? "is-invalid" : ''; ?>" name="password" value="<?= old('password'); ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('password'); ?>
		      	</div>
            </div>

            <a href="/staff" class="secondary-button rounded text-decoration-none">Back</a>
            <button type="submit" class="primary-button rounded">Submit</button>
        </form>
    </div>
<?= $this->endSection(); ?>
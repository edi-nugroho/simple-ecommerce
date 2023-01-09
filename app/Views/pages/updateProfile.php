<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="container my-5 d-flex flex-column align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold">Profile</h3>
            <form action="/user/updateProfile/<?= $user->id ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
                <input type="hidden" name="user_image_lama" value="<?= $user->user_image ?>">
                <div class="mb-3">
                    <div class="profile-picture img-thumbnail mb-2">
                        <img src="/img/profile/<?= $user->user_image; ?>" alt="" class="img-preview">
                    </div>
                    <label for="formFile" class="form-label custom-file-label">Change User Image</label>
                    <input class="form-control custom-file-input" type="file" id="user_image" name="user_image" onchange="previewImg()">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" 
                                    class="form-control" 
                                    name="name" 
                                    id="name" 
                                    placeholder="Name" 
                                    value="<?= (old('name')) ? old('name') : $user->name; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" 
                                    class="form-control" 
                                    name="username"
                                    id="username" 
                                    placeholder="Username" 
                                    value="<?= (old('username')) ? old('username') : $user->username; ?>">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" 
                                    class="form-control"
                                    name="phone_number" 
                                    id="phone_number" 
                                    placeholder="Phone Number" 
                                    value="<?= (old('phone_number')) ? old('phone_number') : $user->phone_number; ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="6"><?= $user->address; ?></textarea>
                </div>
                <a href="/profile" class="primary text-decoration-none py-2 px-3 fw-bold update-button">Back</a><button type="submit" class="primary border border-0 py-2 px-3 fw-bold">Update</button>
                <a href="/changePassword" class="float-end text-decoration-none color-black fw-bold align-baseline">Change Password</a>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>
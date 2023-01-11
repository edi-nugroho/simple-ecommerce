<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Staff</h1>

        <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <a href="/staff/insert" class="primary-button">Add New Staff</a>

        <table id="productTable" class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $user->user_name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->description; ?></td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $user->user_id; ?>">Delete</a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    <?php foreach($users as $user) : ?>
    <div class="modal fade" id="deleteModal<?= $user->user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/users/delete/<?= $user->user_id; ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- Text -->
                        Are you sure you want to delete it?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-button rounded" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-button rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable();
        });
    </script>

<?= $this->endSection(); ?>

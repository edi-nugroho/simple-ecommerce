<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Categories List</h1>

        <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('fail')) : ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?= session()->getFlashdata('fail'); ?>
            </div>
        <?php endif; ?>

        <button type="button" class="primary-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Category</button>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($categories as $c) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $c['category_name']; ?></td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $c['id']; ?>">Delete</a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- Insert Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Add New Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/categories/insert" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="exampleInput">
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-button rounded" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="primary-button rounded">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <?php foreach($categories as $c) : ?>
    <div class="modal fade" id="staticBackdrop<?= $c['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/categories/delete/<?= $c['id']; ?>" method="POST">

                    <div class="modal-body">
                        <!-- Text -->
                        Are you sure you want to delete it?
                        <input type="hidden" name="_method" value="DELETE">
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

<?= $this->endSection(); ?>
<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Products List</h1>

        <a href="/products/insert" class="primary-button">Add New Product</a>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($products as $p) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $p->p_name; ?></td>
                    <td><?= $p->category_name; ?></td>
                    <td><?= rupiah($p->price); ?></td>
                    <td><a href="/products/edit/<?= $p->slug; ?>">Edit</a> | <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $p->p_id; ?>">Delete</a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    <?php foreach($products as $p) : ?>
    <div class="modal fade" id="deleteModal<?= $p->p_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/products/delete/<?= $p->p_id; ?>" method="POST">
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

<?= $this->endSection(); ?>

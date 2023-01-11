<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Option Product</h1>

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

        <a href="/products/insert" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="primary-button">Add New Option</a>

        <table id="inventoryTable" class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Option</th>
                    <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($options as $option) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $option['option']; ?></td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $option['id']; ?>">Delete</a></td>
                    </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Insert Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Insert New Option</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/options/insert" method="POST">

                    <!-- Input Option -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Option</label>
                            <input type="text" class="form-control" name="option" id="exampleInput" placeholder="Example S, M, L">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="modal-footer">
                        <button type="button" class="secondary-button rounded" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-button rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <?php foreach ($options as $option) : ?>
    <div class="modal fade" id="staticBackdrop<?= $option['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/options/delete/<?= $option['id']; ?>" method="POST">

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
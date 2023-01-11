<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Inventory Product</h1>

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

        <a href="/products/insert" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="primary-button">Add New Stock</a>

        <table id="inventoryTable" class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product</th>
                    <th scope="col">Option</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($inventory as $inven) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $inven->name; ?></td>
                        <td><?= $inven->option; ?></td>
                        <td><?= $inven->stock; ?></td>
                        <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#updateInventory<?= $inven->inventory_id; ?>">Update</a> | <a href="" data-bs-toggle="modal" data-bs-target="#deleteInventory<?= $inven->inventory_id; ?>">Delete</a>
                        </td>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Insert New Stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/inventory/insert" method="POST">

                    <!-- Product Select -->
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <select class="form-select" name="product_id" aria-label="Default select example">
                                <?php foreach ($products as $product) : ?>
                                    <option value="<?= $product['id']; ?>"><?= $product['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <select class="form-select" name="option_id" aria-label="Default select example">
                                <?php foreach ($options as $option) : ?>
                                    <option value="<?= $option['id']; ?>"><?= $option['option']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Stock</label>
                            <input type="text" class="form-control" name="stock" id="exampleInput" placeholder="Stock">
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

    <!-- Update Modal -->
    <?php foreach ($inventory as $inven) : ?>
    <div class="modal fade" id="updateInventory<?= $inven->inventory_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Update Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/inventory/update/<?= $inven->inventory_id ?>" method="POST">

                    <!-- Product Select -->
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <select class="form-select" name="product_id" aria-label="Default select example" disabled>
                                <?php foreach ($products as $product) : ?>
                                    <option value="<?= $inven->option_id; ?>" <?= ($option['id'] == $inven->option_id) ? 'selected' : '' ?>><?= $inven->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <select class="form-select" name="option_id" aria-label="Default select example" disabled>
                                <?php foreach ($options as $option) : ?>
                                    <option value="<?= $inven->option_id; ?>" <?= ($option['id'] == $inven->option_id) ? 'selected' : '' ?>><?= $inven->option; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Stock</label>
                            <input type="text" class="form-control" name="stock" id="exampleInput" placeholder="Stock" value="<?= $inven->stock ?>">
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
    <?php endforeach; ?>

    <!-- Delete Modal -->
    <?php foreach ($inventory as $inven) : ?>
    <div class="modal fade" id="deleteInventory<?= $inven->inventory_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/inventory/delete/<?= $inven->inventory_id; ?>" method="POST">
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
            $('#inventoryTable').DataTable();
        });
    </script>
<?= $this->endSection(); ?>
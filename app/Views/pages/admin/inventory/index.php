<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Inventory Product</h1>

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
                        <td><a href="">Update</a> | <a href="">Delete</a></td>
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

    <script>
        $(document).ready(function () {
            $('#inventoryTable').DataTable();
        });
    </script>
<?= $this->endSection(); ?>
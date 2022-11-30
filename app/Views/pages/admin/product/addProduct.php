<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h3 class="form-header mb-3">Input Data Product</h3>

        <form action="/products/save" method="POST">
            <!-- Input Data -->
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" id="exampleInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example" style="cursor: pointer;">
                    <option selected>Choose Category</option>
                    <?php foreach($categories as $c) : ?>
                        <option value="<?= $c['id']; ?>"><?= $c['category_name']; ?></option>
                    <?php endforeach ?>        
                </select>
            </div>
            <div class="mb-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="inputPrice">
            </div>
            <div class="mb-3" id="discount">
                <label for="discountPercent" name="discount class="form-label">Discount</label>
                <input type="text" class="form-control" id="discountPercent">
            </div>

            <!-- Create the editor container -->
            <label for="description">Description</label>
            <textarea name="description" id="description" class="d-none"></textarea>
            <trix-editor input="description"></trix-editor>

            <a href="/products" class="secondary-button rounded text-decoration-none">Back</a>
            <button type="submit" class="primary-button rounded">Submit</button>
        </form>
    </div>
<?= $this->endSection(); ?>
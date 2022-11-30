<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h3 class="form-header mb-3">Edit Data Product</h3>

        <form action="/products/update/<?= $product['p_id']; ?>" method="POST">
            <!-- Input Data -->
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" id="exampleInput" value="<?= $product['name']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example" style="cursor: pointer;">
                    <option selected>Choose Category</option>
                    <?php foreach($categories as $c) : ?>
                        <?php  
                            $selected = '';
                            if($c['id'] == $product['category_id']) { $selected = 'selected'; } ?>
                            <option value="<?= $c['id']; ?>" <?= $selected ?>><?= $c['category_name']; ?></option>
                    <?php endforeach ?>        
                </select>
            </div>

            <div class="mb-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="inputPrice" value="<?= $product['price'] ?>">
            </div>

            <div class="mb-3" id="discount">
                <label for="discountPercent" class="form-label">Discount</label>
                <input type="text" class="form-control" name="discount" id="discountPercent" value="<?= $product['discount'] ?>%" placeholder="Example. 25%">
            </div>

            <!-- Create the editor container -->
            <label for="description">Description</label>
            <textarea name="description" id="description" class="d-none"></textarea>
            <trix-editor input="description"><?= $product['description']; ?></trix-editor>

            <a href="/products" class="secondary-button rounded text-decoration-none">Back</a>
            <button type="submit" class="primary-button rounded">Submit</button>
        </form>
    </div>
<?= $this->endSection(); ?>
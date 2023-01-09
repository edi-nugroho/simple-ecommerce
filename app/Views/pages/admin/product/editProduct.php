<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h3 class="form-header mb-3">Edit Data Product</h3>

        <form action="/products/update/<?= $product->p_id; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="oldImage" value="<?= $product->image ?>">

            <!-- Input Data -->
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Product Name</label>
                <input type="text" class="form-control <?= ($validation->hasError('name')) ? "is-invalid" : ''; ?>" name="name" id="exampleInput" value="<?= $product->p_name; ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('name'); ?>
		      	</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select <?= ($validation->hasError('category_id')) ? "is-invalid" : ''; ?>" name="category_id" aria-label="Default select example" style="cursor: pointer;">
                    <option>Choose Category</option>
                    <?php foreach($categories as $c) : ?>
                        <?php  
                            $selected = '';
                            if($c['id'] == $product->category_id) { $selected = 'selected'; } ?>
                            <option value="<?= $c['id']; ?>" <?= $selected ?>><?= $c['category_name']; ?></option>
                    <?php endforeach ?>        
                </select>
                <div class="invalid-feedback">
		        	<?= $validation->getError('category_id'); ?>
		      	</div>
            </div>

            <div class="mb-3">
                <label for="formFileImages" class="form-label">Image</label>
                
                <?php if($product->image) { ?>
                    <img src="/uploads/<?= $product->image; ?>" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                <?php } else {; ?>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                <?php } ?>

                <input type="file" class="form-control <?= ($validation->hasError('image')) ? "is-invalid" : ''; ?>" name="image" id="image" onchange="previewImage()">
                <div class="invalid-feedback">
		        	<?= $validation->getError('image'); ?>
		      	</div>
            </div>

            <div class="mb-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control <?= ($validation->hasError('price')) ? "is-invalid" : ''; ?>" name="price" id="inputPrice" value="<?= $product->price ?>">
                <div class="invalid-feedback">
		        	<?= $validation->getError('price'); ?>
		      	</div>
            </div>

            <div class="mb-3" id="discount">
                <label for="discountPercent" class="form-label">Discount</label>
                <input type="text" class="form-control" name="discount" id="discountPercent" value="<?= $product->discount ?>%" placeholder="Example. 25%">
            </div>

            <!-- Create the editor container -->
            <label for="description">Description</label>
            <textarea name="description" id="description" class="d-none <?= ($validation->hasError('description')) ? "is-invalid" : ''; ?>"></textarea>
            <trix-editor input="description"><?= $product->description; ?></trix-editor>
            <div class="invalid-feedback">
                <?= $validation->getError('description'); ?>
            </div>

            <a href="/products" class="secondary-button rounded text-decoration-none">Back</a>
            <button type="submit" class="primary-button rounded">Submit</button>
        </form>
    </div>

    <script>
        function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
<?= $this->endSection(); ?>
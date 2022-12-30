<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="product bg-light">
	<div class="container">
		<form action="/cart/insert" method="POST">
			<!-- Input For Cart -->
			<div class="d-none">
				<input type="hidden" name="user_id" value="<?= user_id(); ?>">
				<input type="hidden" name="product_id" value="<?= $product->p_id; ?>">
				<input type="hidden" name="price" value="<?= $product->price; ?>">
			</div>
			<div class="product-image">
				<!-- Single Image -->
				<div class="image">
					<img src="/uploads/<?= $product->image ?>" alt="">
				</div>
				<!-- List Product Image -->
				<div class="image-list">
					
				</div>
			</div>
			<!-- Detail Product -->
			<div class="product-detail">
				<h2 class="pb-2"><?= $product->p_name; ?></h2>
				<?php if($product->discount != 0) : ?>
					<div class="py-1 px-2 bg-black w-auto d-inline-block text-white fs-6 mb-2 fw-bolder"><?= $product->discount; ?>%</div>
				<?php endif; ?>
				<div class="detail-price d-flex pb-2">
					<p style="padding-right: 15px;">Rp. <?= rupiah($product->price); ?></p>
					<?php if($product->discount != 0) : ?>
						<p><strike>Rp. <?= rupiah($beforeDiscount); ?></strike></p>
					<?php endif; ?>
				</div>

				<div class="mb-4">
					<?= $product->description; ?>
				</div>

				<div class="detail-size pb-4">
					<label for="">Size : </label>

					<input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
					<label class="btn" for="option1">M</label>

					<input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
					<label class="btn" for="option2">L</label>

					<input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
					<label class="btn" for="option4">XL</label>				
				</div>

				<div class="detail-qty pb-3">
					<label>Qty : </label>
					<input type="number" name="qty" class="qty-input" min="1" value="1">
				</div>

				<div class="detail-button">
					<button type="submit" class="primary">Add to cart</button>
				</div>
			</div>
		</form>
		</div>
	</div>
<?= $this->endSection(); ?>
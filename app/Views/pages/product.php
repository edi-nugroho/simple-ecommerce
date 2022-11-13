<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
	<div class="product bg-light">
		<div class="container">
			<div class="product-image">
				<div class="image">
					
				</div>
				<div class="image-list">
					
				</div>
			</div>
			<div class="product-detail">
				<h2 class="pb-2"><?= $product['name']; ?></h2>

				<div class="detail-price d-flex pb-2">
					<p style="padding-right: 15px;">Rp. <?= number_format($product['price'], 0, ',','.'); ?></p>
					<p><strike>Rp. 150.000</strike></p>
				</div>

				<div class="mb-4">
					<?= $product['description']; ?>
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
					<input type="number" name="" class="qty-input" min="1">
				</div>

				<div class="detail-button">
					<a href="" class="primary">Add to cart</a>
					<a href="">Buy now</a>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection(); ?>
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

				<div class="detail-size mb-4">
					<label for="" class="mb-2">Size : </label>
					
					<?php foreach ($options as $option) : ?>
						<input type="radio" class="btn-check my-3" name="option_id" id="option<?= $option->id; ?>" value="<?= $option->id; ?>" autocomplete="off">
						<label class="btn" for="option<?= $option->id; ?>"><?= $option->option; ?></label>
					<?php endforeach; ?>
				</div>

				<div class="detail-qty pb-3" id="qtyCart">
					<label>Qty : </label>
					<input type="number" name="qty" class="qty-input" min="1" value="1">
				</div>

				<div class="detail-button">
					<button type="submit" id="buttonCart" class="primary fw-bolder">Add to cart</button>
				</div>
			</div>
		</form>
		</div>
	</div>

	<script>
        $(document).ready(function() {
			
			let input = $('input[name=option_id]');

			input.each(function() {
				let Id = $(this);

				Id.click(function() {
					let optionId = Id.val();
					let productId = $('input[name=product_id]').val();
	
					$.ajax({
						url: 'http://localhost:8080/products/checkstock/' + productId + '/' + optionId, // alamat URL untuk mengecek stok
						type: 'GET', // metode request yang akan digunakan (GET atau POST)
						dataType: 'json', // tipe data yang diharapkan sebagai respon dari server
						success: function(result) { // jika request berhasil, maka akan memanggil fungsi ini
							if (result.stock > 0) {
								// sembunyikan pesan bahwa stok habis
								$('#buttonCart').html('Add to cart');
								$('#buttonCart').removeAttr("disabled", "disabled");
								$('#qtyCart').show();
							} else {
								// tampilkan pesan bahwa stok habis
								$('#buttonCart').html('Sold Out');
								$('#buttonCart').attr("disabled", "disabled");
								$('#qtyCart').hide();
							}
						}
					});
				});
			});
        });
    </script>
<?= $this->endSection(); ?>
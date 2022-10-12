<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
	<div class="all-products bg-light" style="width: 100%;">
		<div class="container">
			<h3 class="pb-4">All products</h3>
			<div class="d-flex justify-content-between" style="flex-wrap: wrap;">
				<?php foreach($products as $p) : ?>
					<div class="product-card mb-5" style="width: 250px; background-color: white; padding: 0;">
						<?php if($p->is_discount == 1) : ?>
							<!-- Discount-->
							<div class="discount" style="background-color: black; color: white; position: absolute;">
								<h6 style="font-weight: 800; margin: 0; padding: 5px 10px;">20%</h6>
							</div>
						<?php endif; ?>
						<!-- Image Sementara -->
						<a href="/product/<?= $p->id; ?>" class="text-decoration-none" style="color: black;"><div class="bang" style="background-color: crimson; width: 100%; height: 300px;"></div></a>
						<!-- Detail Products -->
						<div class="product-detail p-4" style="width: 100%; box-sizing: border-box;">
							<h6 style="font-weight: 700; color: black;"><a href="/product/<?= $p->id; ?>" class="text-decoration-none" style="color: black;"><?= $p->name; ?></a></h6>

							<p style="font-weight: 700; color: rgb(126, 126, 126); margin-bottom: 5px;">Tshirt</p>

							<div class="price-cart d-flex justify-content-between align-items-center">
								<div class="price">
									<p style="font-size: 12px; font-weight: 700; margin-bottom: 5px;"><strike>Rp. 150.000</strike></p>
									<p style="font-size: 12px; font-weight: 700; margin: 0;">Rp. <?= $p->price; ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?= $this->endSection(); ?>
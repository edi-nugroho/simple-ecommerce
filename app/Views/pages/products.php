<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
	<div class="all-products bg-light" style="width: 100%;">
		<div class="container">
			<h3 class="pb-4">All products</h3>
			<div class="d-flex justify-content-between">
				<?php foreach($products as $p) : ?>
					<div class="products-card shadow-sm mb-5">
						<?php if($p['discount'] != 0) : ?>
							<!-- Discount-->
							<div class="discount">
								<h6><?= $p['discount']; ?>%</h6>
							</div>
						<?php endif; ?>
						<!-- Image Sementara -->
						<div class="image-card">
							<a href="/product/<?= $p['slug']; ?>" class="text-decoration-none"><img src="/uploads/<?= $p['image'] ?>" alt="" width="300"></a>
						</div>
						<!-- Detail Products -->
						<div class="product-detail p-4">
							<h6 class="product-title"><a href="/product/<?= $p['slug']; ?>" class="text-decoration-none color-black"><?= $p['p_name']; ?></a></h6>

							<p class="category-title"><?= $p['category_name']; ?></p>

							<div class="price-cart d-flex justify-content-between align-items-center">
								<div class="price">
									<?php if($p['discount'] != 0) : ?>
										<p class="mb-1"><strike>Rp. <?= rupiah(beforeDiscount($p['price'], $p['discount'])); ?></strike></p>
									<?php endif; ?>
									<p class="m-0">Rp. <?= rupiah($p['price']); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="d-flex justify-content-center">
				<?= $pager->links('products', 'product_pagination') ?>
			</div>
		</div>
	</div>
<?= $this->endSection(); ?>
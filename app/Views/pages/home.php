<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

	<section class="container" id="carousel">
		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="/img/slider/slide-1.png" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="/img/slider/slide-2.png" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="/img/slider/slide-3.png" class="d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</section>

	<section class="products bg-black">
		<div class="container d-flex justify-content-between">
			<?php foreach($products as $p) : ?>
					<div class="products-card mb-5">
						<?php if($p->discount != 0) : ?>
							<!-- Discount-->
							<div class="discount">
								<h6><?= $p->discount; ?>%</h6>
							</div>
						<?php endif; ?>
						<!-- Image Sementara -->
						<div class="image-card">
							<a href="/product/<?= $p->slug; ?>" class="text-decoration-none"><img src="/uploads/<?= $p->image ?>" alt="" width="300"></a>
						</div>
						<!-- Detail Products -->
						<div class="product-detail p-4">
							<h6 class="product-title"><a href="/product/<?= $p->slug; ?>" class="text-decoration-none color-black"><?= $p->p_name; ?></a></h6>

							<p class="category-title"><?= $p->category_name; ?></p>

							<div class="price-cart d-flex justify-content-between align-items-center">
								<div class="price">
									<?php if($p->discount != 0) : ?>
										<p class="mb-1"><strike>Rp. <?= rupiah(beforeDiscount($p->price, $p->discount)); ?></strike></p>
									<?php endif; ?>
										<p class="m-0">Rp. <?= rupiah($p->price); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
		</div>
		<center>
			<a href="/allproducts">View all</a>
		</center>
	</section>

	<section class="categories">
		<div class="container d-flex justify-content-between">
			<div class="jacket">
				<h1>JACKET</h1>
			</div>
			<div class="pants">
				<h1>PANTS</h1>
			</div>
			<div class="tshirt">
				<h1>T'SHIRT</h1>
			</div>
		</div>
	</section>
<?= $this->endSection(); ?>
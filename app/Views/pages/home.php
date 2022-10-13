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
		<div class="container d-flex justify-content-between" style="flex-wrap: wrap;">
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

							<p style="font-weight: 700; color: rgb(126, 126, 126); margin-bottom: 5px;"><?= $p->category_name; ?></p>

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
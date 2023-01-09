<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="d-flex justify-content-center w-100 p-5">
        <div class="card w-50">
            <div class="card-body p-4">
                <h5 class="card-title fw-bolder mb-4">Checkout</h5>
                <form action="/checkout/insert" method="POST" class="d-inline">
                    <p class="card-text">
                        <div>
                            <span class="fw-semibold">Nama</span>
                            <p class="text-muted"><?= user()->name; ?></p>
                            <input type="hidden" name="user_id" value="<?= user_id(); ?>">
                        </div>
                        <div class="w-85">
                            <span class="fw-semibold">Alamat</span>
                            <p class="text-muted"><?= user()->address; ?></p>
                        </div>
                        <div>
                            <span class="fw-semibold">Metode Pembayaran</span>
                            <p class="text-muted">COD (Cash On Delivery)</p>
                            <input type="hidden" name="payment" value="COD">
                        </div>
                        <div class="mb-3">
                            <span class="fw-semibold">Produk</span>
                            <?php foreach($product as $p) : ?>
                                <p class="text-muted mb-0"><?= $p->p_name; ?> <?= $p->option; ?> (<?= $p->qty; ?> Pcs)</p>
                                <input type="hidden" name="product_id[]" value="<?= $p->product_id; ?>">
                                <input type="hidden" name="qty[]" value="<?= $p->qty; ?>">
                                <input type="hidden" name="option_id[]" value="<?= $p->options_id; ?>">
                            <?php endforeach; ?>
                        </div>
                        <div>
                            <span class="fw-semibold">Ongkir</span>
                            <p class="text-muted">Rp. 10.000</p>
                        </div>
                        <div>
                            <span class="fw-semibold">Total</span>
                            <p class="text-muted">Rp. <?= rupiah($priceTotal->total + 10000); ?></p>
                            <input type="hidden" name="total" value="<?= $priceTotal->total + 10000; ?>">
                            <input type="hidden" name="status" value="On Process">
                        </div>
                    </p>
                    <button type="submit" class="btn bg-black text-white py-2 px-4 fw-bolder float-end">Continue</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>

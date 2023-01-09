<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="container my-4">
        <h2 class="fw-bold mb-3">History Order Detail</h2>
        <?php foreach ($order as $ordr) :  ?>
            <div class="order w-100 d-flex flex-row border border p-4 rounded-5 mb-3">
                <div class="order-image">
                    <img src="/uploads/<?= $ordr->image ?>" alt="">
                </div>
                <div class="order-detail d-flex flex-column justify-content-center flex-grow-1">
                    <p class="fs-5 fw-bold"><?= $ordr->product_name; ?></p>
                    <p class="text-muted fw-semibold"><?= $ordr->category_name; ?></p>
                    <p class="fw-bold"><?= $ordr->option; ?></p>
                    <p class="fw-bold">Rp. <?= rupiah($ordr->price); ?></p>
                    <p class="fw-bold">Payment : <?= $ordr->payment; ?></p>
                </div>
                <div class="d-flex justify-content-center align-items-center fw-bold px-4">
                    <p><?= $ordr->qty; ?> Pcs</p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="order-address mt-5 mb-4 w-50">
            <h5 class="fw-bolder">Address</h5>
            <?= user()->address; ?>
        </div>
        <div class="order-button d-flex">
            <p class="">Total : Rp. <?= rupiah($orderTotal->total); ?></p>
        </div>
        
    </div>
<?= $this->endSection(); ?>
<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="container my-4">
        <h2 class="fw-bold mb-3">Order Detail</h2>
        <?php foreach ($order as $ordr) :  ?>
            <div class="w-100 d-flex flex-row border border p-4 rounded-5 mb-3">
                <div class="order-image">
                    <img src="/uploads/<?= $ordr->image ?>" alt="" width="150">
                </div>
                <div class="order-detail d-flex flex-column justify-content-center flex-grow-1">
                    <p class="text-black fw-bolder"><?= $ordr->product_name; ?></p>
                    <p class="text-muted"><?= $ordr->category_name; ?></p>
                    <p class="text-black fs-6 fw-semibold"><?= $ordr->option; ?></p>
                    <p class="text-black fs-6 fw-semibold">Rp. <?= rupiah($ordr->price); ?></p>
                    <p class="text-black fs-6 fw-semibold">Payment : <?= $ordr->payment; ?></p>
                </div>
                <div class="d-flex justify-content-center align-items-center px-4">
                    <p class="text-black fw-bolder"><?= $ordr->qty; ?> Pcs</p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="order-address mt-5 mb-4 w-50">
            <h5 class="fw-bolder">Address</h5>
            <?= user()->address; ?>
        </div>

        <p class="bg-black d-inline-block px-3 py-2 text-white fw-semibold">Status : <?= $orderStatus->status; ?></p> 
        <p class="bg-black d-inline-block px-3 py-2 text-white fw-semibold">Total : Rp. <?= rupiah($orderTotal->total); ?></p>
    </div>
<?= $this->endSection(); ?>
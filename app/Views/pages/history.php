<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-4">
        <h2 class="fw-bold mb-3">Order History</h2>
        <?php $i = 1; ?>
        <?php foreach ($order as $order) : ?>
            <div class="border rounded-4 p-4 mb-3 fw-bolder col-lg-6">
                <p>Order <?= $i; ?></p>
                <p>Total : <?= rupiah($order->total); ?></p>
                <div>
                    <a href="/historyDetail/<?= $order->order_slug; ?>" class="bg-black text-white py-2 px-3 text-decoration-none border border-dark border-2">Detail</a>  
                </div>
            </div>
        <?php $i++; ?>
        <?php endforeach; ?>       
    </div>    
<?= $this->endSection(); ?>
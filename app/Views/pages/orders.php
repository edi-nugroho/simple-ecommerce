<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="container my-5">
        <h2 class="fw-bold">Orders</h2>
        <?php if ($orders == NULL) : ?>
            <p>Empty</p>
        <?php endif; ?>
        
        <?php $i = 1; ?>
        <?php foreach ($orders as $order) : ?>
            <div class="border rounded-4 p-4 mb-3 fw-bolder col-lg-6">
                <p>Order <?= $i; ?></p>
                <p>Status : <?= $order->status; ?></p>
                <p>Total : <?= rupiah($order->total); ?></p>
                <div>
                    <a href="/orderDetail/<?= $order->slug; ?>" class="bg-black text-white py-2 px-3 text-decoration-none border border-dark border-2">Detail</a>
                    <?php if ($order->status == 'On Process') : ?>
                        <a href="/orders/delete/<?= $order->id; ?>" class="bg-body text-dark py-2 px-3 text-decoration-none border-0 fw-semibold">Cancel</a>
                    <?php endif; ?>   
                </div>
            </div>
        <?php $i++; ?>
        <?php endforeach; ?>
    </div>
<?= $this->endSection(); ?>
<?= $this->extend('layouts/admin/template'); ?>

<?= $this->section('content'); ?>
    <div class="content">
        <h1>Order List</h1>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Total</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($orders as $order) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td><?= $order->nameUser; ?></td>
                    <td><?= $order->orderStatus; ?></td>
                    <td>Rp. <?= rupiah($order->total); ?></td>
                    <td><a href="">Detail</a> | <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $order->orderId; ?>">Update</a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- Update Modal -->
    <?php foreach($orders as $order) : ?>
    <div class="modal fade" id="staticBackdrop<?= $order->orderId; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/orderList/updateStatus/<?= $order->orderId ?>" method="POST">
                    <!-- <input type="hidden" name="qty" value="<?= $order->qty ?>"> -->

                    <div class="modal-body">
                        <!-- Text -->
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="On Process">On Process</option>
                            <option value="On Delivery">On Delivery</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-button rounded" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-button rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?= $this->endSection(); ?>
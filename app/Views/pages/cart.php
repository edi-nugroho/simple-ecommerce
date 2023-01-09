<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="cart">
        <div class="container">
            <h2>Cart</h2>
            <?php if($cart) { ?>
                <?php foreach($cart as $c) : ?>
                <form action="cart/update/<?= $c->c_id; ?>" class="d-inline" method="POST">
                <div class="cart-detail">
                    <div class="cart-img__title">
                        <div class="img-product">
                            <img src="/uploads/<?= $c->image ?>" alt="" width="200">
                        </div>
                        <div class="title_product">
                            <a href=""><?= $c->p_name; ?></a>
                            <p><?= $c->option; ?></p>
                            <a href="<?= site_url('cart/delete/') . $c->c_id ?>"
                               name="remove"
                               class="remove__button">Remove</a>
                            <button 
                                type="submit"
                                name="update"
                                class="remove__button">Update</button>
                        </div>
                    </div>
                    <div class="cart-qty__price">
                        <div class="qty__detail">
                            <label for="qty" class="mb-3">Qty</label>
                            <input type="number" 
                                   name="qty" 
                                   class="qty__cart" 
                                   value="<?= $c->qty; ?>">
                        </div>

                        <div class="price__detail">
                            <p>Price</p>
                            <p>Rp. <?= rupiah($c->total); ?></p>
                            <input type="hidden" name="price" value="<?= $c->price ?>">
                        </div>
                    </div> 
                </div>
                </form>
                <?php endforeach; ?>
                <div class="bottom-cart-button">
                    <a href="/checkout">Checkout</a>
                </div>
            <?php }else{ ?>
                <div class="cart-detail">
                    <p>Empty</p>
                </div>
            <?php } ?>
        </div>
    </div>
<?= $this->endSection(); ?>
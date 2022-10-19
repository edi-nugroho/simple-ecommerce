<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <div class="cart">
        <div class="container">
            <h2>Cart</h2>
            <div class="cart-detail">
                <div class="cart-img__title">
                    <div class="img-product">
    
                    </div>
                    <div class="title_product">
                        <a href="">Tshirt Product One</a>
                        <p>L</p>
                        <a href="" class="remove__button">Remove</a>
                    </div>
                </div>
                <div class="cart-qty__price">
                    <div class="qty__detail">
                        <label for="" class="mb-3">Qty</label>
                        <input type="number" name="qty" class="qty__cart">
                    </div>

                    <div class="price__detail">
                        <p>Price</p>
                        <p>Rp. 150.000</p>
                    </div>
                </div>

            </div>
            <div class="checkout-button">
                <a href="">Checkout</a>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
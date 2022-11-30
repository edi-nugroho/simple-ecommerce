<?php 

function discount($harga, $discount){
    
    $hasil = $harga * $discount / 100; // Mencari Harga Discount

    $harga -= $hasil; // Harga Produk Dikurang Harga Discount
    
    return $harga;
}
<?php 

function beforeDiscount($harga, $discount){
    
    // Mencari harga sebelum diskon
    // $hasil = 100 / 100 - $discount * $harga;
    $hasilA = 100 - $discount;
    $hasilB = $harga * 100;
    $hasil = $hasilB / $hasilA;

    return $hasil;
}
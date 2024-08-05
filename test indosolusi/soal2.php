<?php 
function cekBil($num) {
    if($num%2==0){
        echo 'Bilangan Genap';
    }else {
        echo 'Bilangan Ganjil';
    }

}

cekBil(5);
?>
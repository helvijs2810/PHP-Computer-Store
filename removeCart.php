<?php
    session_start();

    $currentCart = $_SESSION['buyingItems'];

    $item = $_GET['item'];

    foreach($currentCart as $x => $x_value){
        if($item == $x){
            unset($currentCart[$item]);
            break;
        }
    }

    $_SESSION['buyingItems'] = $currentCart;
    header("Location: cart.php");
?>
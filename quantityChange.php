<?php
    session_start();

    $currentCart = $_SESSION['buyingItems'];

    foreach($currentCart as $x => $x_value){
        $selectOption = $_POST[$x];
        

    }
?>
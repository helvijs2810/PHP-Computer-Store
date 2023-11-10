<?php
    session_start();

    if(isset($_SESSION['buyingItems'])) $purchase = $_SESSION['buyingItems'];

    $id = $_GET['id'];

    $link = mysqli_connect("localhost", "root", "root", "shopdb");
    $sql = "SELECT item_name FROM products WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $rowItem = mysqli_fetch_assoc($result);

    $sql = "SELECT item_price FROM products WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $rowPrice = mysqli_fetch_assoc($result);

    $purchase += [$rowItem['item_name'] => $rowPrice['item_price']];

    $_SESSION['buyingItems']=$purchase;
    mysqli_close($link);
    header("Location: cart.php");
?>
<?php
    session_start();

    $link = mysqli_connect("localhost", "root", "root", "shopdb");
    
    $entry = "SELECT * FROM products";
    $result = mysqli_query($link, $entry);
    $_SESSION['numrows'] = mysqli_num_rows($result);

    mysqli_close($link);

    if(isset($_POST['next'])){
        if($_SESSION['pageNum']*6 < $_SESSION['numrows']){
            $_SESSION['pageNum']++;
        } 
    } else {
        if($_SESSION['pageNum'] > 1){
            $_SESSION['pageNum']--;
        }
    }

    header('Location: shopPage.php');
?>

<?php
session_start();

require_once("setup.php");
$conn = establishConnection(false);

$file = $_FILES['itemImage']['tmp_name'];
$image = addslashes(file_get_contents($file));

if(isset($_GET["drop"]) && $_GET["drop"] == "yes"){
    $sql = "DROP DATABASE shopdb";
    mysqli_query($conn, $sql);
}

$sql = "CREATE DATABASE IF NOT EXISTS shopdb";
if(mysqli_query($conn, $sql)){
    echo "<p>Databse shopdb created</p>"; 
    $_SESSION['dbExists'] = true;
} else { 
    echo "<p>Database shopdb failed to be created:" . mysqli_error($conn) . "</p>";
}

$sql = "USE shopdb";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS products(
    id int auto_increment,
    item_name varchar(30),
    item_price int(6) UNSIGNED,
    item_image mediumblob,
    primary key (id)
)";

mysqli_query($conn, $sql);

$sql = "INSERT INTO products(item_name, item_price, item_image) VALUES ('$_POST[itemName]', '$_POST[itemPrice]', '$image')";

if(mysqli_query($conn, $sql)){
    echo "<p>Success!</p>";
} else {
    echo "<p>Failed!</p>";
}

mysqli_close($conn);
?>
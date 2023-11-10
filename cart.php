<?php
    session_start();

    $test = $_SESSION['buyingItems'];
    $x = array();

    $_SESSION['totalPrice'] = 0;
    $_SESSION['itemPricePerQuantity'] = 0;

    $itemIndex = 0;

    /* $itemArray = $_SESSION['quantityItemHold']; */
?>
<html>
    <head>
        <title>MyShop Home</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <header>
            <?php include('./include/header.php');?>
        </header>
        <main>
            <div class="row-one">
                <table id="shop-items">
                    <tr>
                        <th><p>Item</p></th>
                        <th><p>Price</p></th>
                        <th></th>
                    </tr>
                    <?php 
                        foreach($test as $x => $x_value){
                            echo "<tr>";
                            echo "<td><p>" . $x . "</p></td>";
                            echo "<td><p>$" .$x_value. "</p></td>";
                            echo "<form method='post' action='removeCart.php?item=".$x."'>";
                            echo "<td><input type='submit' value='Remove'></td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="row-two">
            <form method='post' action='quantityChange.php'>
                <table id="shop-items">
                    <tr>
                        <th><p>Item</p></th>
                        <th><p>Price</p></th>
                        <th><p>Quantity</p></th>
                        <th></th>
                    </tr>
                    <?php 
                        foreach($test as $x => $x_value){
                                $_SESSION['totalPrice'] += $x_value * 1;
                                $_SESSION['itemPricePerQuantity'] = $x_value * 1;
                            echo "<tr>";
                            echo "<td><p>" . $x . "</p></td>";
                            echo "<td><p>$" .$x_value. "</p></td>";
                            echo "<td>";
                            echo "<select id='quantity".$x."'>";            
                            echo "<option value='1'>1</option>";
                            echo "<option value='2'>2</option>";
                            echo "<option value='3'>3</option>";
                            echo "<option value='4'>4</option>";
                            echo "<option value='5'>5</option>";
                            echo "</td>";
                            echo "<td><p>$".$_SESSION['itemPricePerQuantity']."</p></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td><input type='submit' value='Recalculate'></td>";
                        echo "<td><p>$".$_SESSION['totalPrice']."</p></td>";
                        echo "</tr>";
                    ?>
                </table>
                </form>
            </div>
        </main>
        <footer>
            <?php include('./include/footer.php');?>
        </footer>
    </body>
</html>
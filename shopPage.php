<?php
    session_start();

    if(!isset($_SESSION['dbExists'])) $_SESSION['dbExists'] = false;
    if($_SESSION['dbExists'] == false) header('Location: addItems.php');

    if(!isset($_SESSION['pageNum'])) $_SESSION['pageNum'] = 1;
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
                    <?php include('getProducts.php');?>
                </table>
            </div>
            <div class="row-two">
                <form class="page-buttons" method="post" action="setPage.php">
                    <table>
                        <tr>
                            <th><input type="submit" name="back" value="Back"/></th>
                            <th><input type="submit" name="next" value="Next"/></th>
                        </tr>
                    </table>
                </form>
            </div>
        </main>
        <footer>
            <?php include('./include/footer.php');?>
        </footer>
    </body>
</html>
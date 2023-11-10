<html>
    <head>
        <title>Add Items To Shop</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <header>
            <?php include('./include/header.php');?>
        </header>
        <main>
            <form enctype="multipart/form-data" method="post" action="database.php">
                <table id="register">
                    <tr>
                        <th><p>Enter Product Details</p></th>
                    </tr>
                    <tr>
                        <th><label for="itemName">Product Name:</label></th>
                        <th><input type="text" id="itemName" name="itemName"></th>
                    </tr>
                    <tr>
                        <th><label for="itemPrice">Product Price:</label></th>
                        <th><input type="number" id="itemPrice" name="itemPrice"></th>
                    </tr>
                    <tr>
                        <th><label for="itemImage">Upload Image:</label></th>
                        <th><input type="file" name="itemImage" value="Submit"></th>
                    </tr>
                    <tr>
                        <th><input type="submit" name="submit" value="Add Record"></th>
                    </tr>
                </table>
            </form>
        </main>
        <footer>
            <?php include('./include/footer.php');?>
        </footer>
    </body>
</html>
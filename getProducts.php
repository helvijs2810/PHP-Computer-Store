<?php
    session_start();

    $startID = ($_SESSION['pageNum']*6) - 5;
    $tabcol = 1;
    $itemcount = 1;

    $link = mysqli_connect("localhost", "root", "root", "shopdb");
    
    while($itemcount <= 6){
        echo "<tr>";
        while($tabcol <= 3){
            $sql = "SELECT item_image FROM products WHERE id=$startID";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);

            echo '<td>';
            echo '<img src="data:image/jpg;base64,'.base64_encode($row['item_image']).'"/>';
            
            $sql = "SELECT item_name FROM products WHERE id=$itemcount";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);

            echo '<p>'.$row['item_name'].'</p>';

            $sql = "SELECT item_price FROM products WHERE id=$itemcount";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);

            echo '<p>$'.$row['item_price'].'</p>';
            echo '<form method="post" action="addCart.php?id='.$startID.'">';
            echo '<input type="submit" value="Add to Cart">';
            echo '</form>';
            echo '</td>';
            ++$itemcount;
            ++$tabcol;
            ++$startID;
            
            if($_SESSION['numrows'] < $startID){
                break;
            }
        }
        echo "</tr>";
        $tabcol = 1;
        if($_SESSION['numrows'] < $startID){
            break;
        }
    }

    mysqli_close($link);
?>
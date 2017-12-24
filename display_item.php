<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecart_site");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
           Display Items</h2>

        <div class="block">
        <?php

        $res=mysqli_query($link,"select * from product");
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>"; echo "Product Image"; echo "</th>";
        echo "<th>"; echo "Product Name"; echo "</th>";
        echo "<th>"; echo "Product Price"; echo "</th>";
        echo "<th>"; echo "Product Quantity"; echo "</th>";
        echo "<th>"; echo "Product Category"; echo "</th>";
        echo "<th>"; echo "Delete"; echo "</th>";
        echo "<th>"; echo "Edit"; echo "</th>";
        echo "</tr>";
        while($row=mysqli_fetch_array($res)){
	        echo "<tr>";
	        echo "<td>"; ?> <img src="<?php echo row["product_image"]?>"  height="100" width="100"><?php echo "</td>";
	        echo "<td>"; echo $row["product_name"]; echo "</td>";
	        echo "<td>"; echo $row["product_price"]; echo "</td>";
	        echo "<td>"; echo $row["product_qty"]; echo "</td>";
	        echo "<td>"; echo $row["product_category"]; echo "</td>";
	        echo "<td>";?><a href="delete.php?id=<?php echo $row['id']?>">Delete</a> <?php echo "</td>";
	        echo "<td>";?><a href="edit.php?id=<?php echo $row['id']?>">Edit</a> <?php echo "</td>";
	        echo "</tr>";
        }
        echo "</table>";

        ?>

        </div>
    </div>
    <?php
    include "footer.php";

    ?>
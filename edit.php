<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecart_site");
$id=$_GET['id'];
$res=mysqli_query($link,"select * from  product where id=$id");
while($row=mysqli_fetch_array($res)){
    $product_name=$row["product_name"];
    $product_price=$row["product_price"];
    $product_qty=$row["product_qty"];
    $product_img=$row["product_image"];
    $product_cat=$row["product_category"];
    $product_desc=$row[" product_desc"];
}
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
           Edit Items</h2>

        <div class="block">
        <form name = "form1" action="" method="post"  enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td colspan="2" align="center">
                                    <img src="<?php echo $product_img; ?>" height="100" width="100">
                                </td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td><input type="text" name="pnm" value="<?php echo $product_name; ?>"></td>
                            </tr>
                            <tr>
                                <td>Product Price</td>
                                <td><input type="text" name="pprice" value="<?php echo $product_price; ?>"></td>
                            </tr>
                            <tr>
                                <td>Product Quantity</td>
                                <td><input type="text" name="pqty" value="<?php echo $product_qty; ?>"></td>
                            </tr>
                            <tr>
                                <td>Product Image</td>
                                <td><input type="file" name="pimage"></td>
                            </tr>
                            <tr>
                                <td>Product Category</td>
                                <td>
                                    <input type="text" name="pcategory" value="<?php echo $product_cat; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Product Description</td>
                                <td><textarea cols = "15" rows="10" name ="pdesc" value="<?php echo $product_desc; ?>"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan = "2" align="center">
                                    <input type="submit" name="submit1" value="up">
                                </td>
                            </tr>
                        </table>
                    </form>

        </div>
    </div>
    <?php


    if (isset($_POST["submit1"])) {
        $fnm=$_FILES["pimage"]["name"];

        if($fnm==""){
            mysqli_query($link,"update product set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]' ,product_category='$_POST[pcategory]' ,product_desc='$_POST[pdesc]' where id=$id");
        }
        else{
             $v1 = rand(1111,9999);
            $v2 = rand(1111,9999);
            $v3 = $v1.$v2;
            $v3 = md5($v3);

            if (isset($_POST["submit1"])){
                $fnm = $_FILES["pimage"]["name"];
                $dst = "./product_image/".$v3.$fnm;
                $dst1 = "product_image/".$v3.$fnm;
                move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);


              mysqli_query($link,"update product set product_image='$dst1', product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]' ,product_category='$_POST[pcategory]' ,product_desc='$_POST[pdesc]' where id=$id"); 
        }

        ?>



<script type="text/javascript">
    window.location="display_item.php";
</script>
        <?php
    }
    include "footer.php";

    ?>


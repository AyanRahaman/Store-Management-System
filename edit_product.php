<?php
//For connecting with the database
require "connection.php";
session_start();


$user_first_name =  $_SESSION["user_first_name"];
$user_last_name =  $_SESSION["user_last_name"];

if(!empty($user_first_name) && !empty($user_last_name))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <?php
        if(isset($_GET["id"]))
        {
            $getid = $_GET["id"];

            $sql = "SELECT * FROM product WHERE product_id = '$getid'";

            $query = $conn->query($sql);

            if($data = mysqli_fetch_assoc($query))
            {
                $product_id = $data["product_id"];
                $product_name = $data["product_name"];
                $product_category = $data["product_category"];
                $product_code = $data["product_code"];
                $product_entry_date = $data["product_entry_date"];
           

            }
        }

    ?>

<?php
       if(isset($_GET["product_name"]))
       {
            $new_product_id = $_GET["product_id"];
            $new_product_name = $_GET["product_name"];
            $new_product_category = $_GET["product_category"];
            $new_product_code = $_GET["product_code"];
            $new_product_entry_date = $_GET["product_entry_date"];


            $sql1 = "UPDATE product SET product_name = '$new_product_name',product_category = '$new_product_category',product_code = '$new_product_code', product_entry_date = '$new_product_entry_date'
            WHERE product_id = '$new_product_id'";
            

            if($conn->query($sql1))
            {
                echo "Update Succesfull";
            }
            else
            {
                echo "Not Updated";
            }
            
       }

    ?>
    <form action="" method="GET">
        Product : <br>
        <input type="text" name="product_name" value="<?php echo $product_name; ?>"><br><br>
        Product Category : <br>
        <select name="product_category" id="">
            <?php

                    $sql2 = "SELECT * FROM category";
                        
                    $query2 = $conn->query($sql2);

                   while($data = mysqli_fetch_assoc($query2))
                   {
                    $category_id = $data["category_id"];
                    $category_name = $data["category_name"];
                ?>
                    <option value='<?php echo $category_id; ?>'<?php if($category_id == $product_category){echo 'selected';}  ?>>
                    <?php echo $category_name; ?>
                </option>

                <?php
                   }
                ?>
        </select><br><br>
        Product Code: <br>
        <input type="text" name="product_code" value="<?php echo $product_code; ?>"><br><br>
        Product Entry Date : <br>
        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date; ?>"><br><br>
        <input type="text" name="product_id" value="<?php echo $product_id; ?>" hidden>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
}
else{
    header("location:login.php");
}
?>
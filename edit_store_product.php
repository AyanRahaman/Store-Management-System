<?php
//For connecting with the database
require "connection.php";
//For calling the myfunction.php file
require "myfunction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Store Product</title>
</head>
<body>
    <?php
         if(isset($_GET["id"]))
         {
             $getid = $_GET["id"];
 
             $sql = "SELECT * FROM store_product WHERE store_product_id = '$getid'";
 
             $query = $conn->query($sql);
 
             if($data = mysqli_fetch_assoc($query))
             {
                 $store_product_id = $data["store_product_id"];
                 $store_product_name = $data["store_product_name"];
                 $store_product_quientity = $data["store_product_quientity"];
                 $store_product_entry_date = $data["store_product_entry_date"];
             }
         }

    ?>
<?php
       if(isset($_GET["store_product_name"]))
       {
            $new_store_product_id = $_GET["store_product_id"];
            $new_store_product_name = $_GET["store_product_name"];
            $new_store_product_quientity = $_GET["store_product_quientity"];
            $new_store_product_entry_date = $_GET["store_product_entry_date"];


            $sql1 = "UPDATE store_product SET store_product_name = '$new_store_product_name',store_product_quientity = '$new_store_product_quientity',store_product_entry_date	 = '$new_store_product_entry_date'
            WHERE store_product_id = '$new_store_product_id'";
            

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
        <select name="store_product_name" id="">
            <?php
                   $sql2 = "SELECT * FROM product";
        
                   $query = $conn->query($sql2);
                   
                   
                   while($data = mysqli_fetch_assoc($query))
                   {
                                       $data_id = $data["product_id"];
                                       $data_name = $data["product_name"];
                   ?>
                               <option value='<?php echo $data_id; ?>'<?php if($store_product_name == $data_id){ echo "Selected"; } ?>><?php echo $data_name; ?></option>";
                 <?php  }  ?>
        </select><br><br>
        Product quientity : <br>
        <input type="number" name="store_product_quientity" value="<?php echo $store_product_quientity; ?>"><br><br>
        Store Entry Date : <br>
        <input type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date; ?>"><br><br>
        <input type="text" name="store_product_id" value="<?php echo $store_product_id; ?>" hidden>
        <input type="submit" value="submit">
    </form>
</body>
</html>
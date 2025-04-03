<?php
//For connecting with the database
require "connection.php";
//For calling the myfunction.php file
require "myfunction.php";
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
    <title>Add Store Product</title>
</head>
<body>
    <?php
    if(isset($_GET["store_product_name"]))
    {
        $store_product_name =  $_GET["store_product_name"];
        $store_product_quientity =  $_GET["store_product_quientity"];
        $store_product_entry_date =  $_GET["store_product_entry_date"];
        


        $sql = "INSERT INTO store_product (store_product_name,store_product_quientity,store_product_entry_date)
        VALUES('$store_product_name','$store_product_quientity','$store_product_entry_date')";


        if($conn->query($sql) == TRUE)
        {
            echo "data succesfully submitted";
        }
        else
        {
            echo "Data not inserted, something went wrong";
            // echo "Error: " . $sql . "<br>" . $conn->error; // to check what is error
        }
    }

    ?>

    
    <form action="" method="GET">
        Product : <br>
        <select name="store_product_name" id="">
            <?php
                   data_list('product','product_id','product_name');
            ?>
        </select><br><br>
        Product quientity : <br>
        <input type="text" name="store_product_quientity"><br><br>
        Store Entry Date : <br>
        <input type="date" name="store_product_entry_date"><br><br>
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
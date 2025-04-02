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
    <title>Add Spend Product</title>
</head>
<body>
    <?php
    if(isset($_GET["spend_product_name"]))
    {
        $spend_product_name =  $_GET["spend_product_name"];
        $spend_product_quantity =  $_GET["spend_product_quantity"];
        $spend_product_entry_date =  $_GET["spend_product_entry_date"];
        


        $sql = "INSERT INTO spend_product (spend_product_name,spend_product_quantity,spend_product_entry_date)
        VALUES('$spend_product_name','$spend_product_quantity','$spend_product_entry_date')";


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
        <select name="spend_product_name" id="">
            <?php
                   data_list('product','product_id','product_name');
            ?>
        </select><br><br>
        Product quientity : <br>
        <input type="text" name="spend_product_quantity"><br><br>
        Spend Entry Date : <br>
        <input type="date" name="spend_product_entry_date"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
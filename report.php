<?php
//For connecting with the database
require "connection.php";
session_start();


$user_first_name =  $_SESSION["user_first_name"];
$user_last_name =  $_SESSION["user_last_name"];

if(!empty($user_first_name) && !empty($user_last_name))
{

    $cat_sql = "SELECT * FROM product";
    $cat_query = $conn->query($cat_sql);

    $data_list = array();

    while($cat_data = mysqli_fetch_assoc($cat_query))
    {
    $product_id = $cat_data["product_id"];
    $product_name = $cat_data["product_name"]; 

    $data_list[$product_id] = $product_name; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <?php

    ?>
    
    <form action="" method="GET">
    Select Product Name :
    <select name="product_name" id="">
    <?php
        $sql = "SELECT * FROM product";
        $query = $conn->query($sql);
    
        while($data = mysqli_fetch_assoc($query))
        {
            $product_id = $data["product_id"];
            $product_name = $data["product_name"];
    ?>
        
            <option value="<?php echo $product_id; ?>"><?php echo $product_name; ?></option>
        <?php } ?>
        </select>
        <input type="submit" value="Generate Report">
    </form>
    <h1>Store Product</h1>
    <?php
    // report for store product
    if(isset($_GET["product_name"]))
    {
        $product_name = $_GET["product_name"];

        $sql1 = "SELECT * FROM store_product WHERE store_product_name = $product_name";

        $query1 = $conn->query($sql1);

        while($data1 = mysqli_fetch_array($query1))
        {
        $store_product_name = $data1["store_product_name"];
        $store_product_quientity = $data1["store_product_quientity"];
        $store_product_entry_date = $data1["store_product_entry_date"];

        echo "<h2>$data_list[$store_product_name]</h2>";
        echo "<table border='1'>
            <tr>
                <td>Store date</td>
                <td>Amount</td>
            </tr>
            <tr>
                <td>$store_product_entry_date</td>
                <td>$store_product_quientity</td>
            </tr>
        </table>";
        }

    
    }
    ?>
    <h1>Spend Product</h1>
    <?php
    // report for store product
    if(isset($_GET["product_name"]))
    {
        $product_name = $_GET["product_name"];

        $sql2 = "SELECT * FROM spend_product WHERE spend_product_name = $product_name";

        $query2 = $conn->query($sql2);

        while($data2 = mysqli_fetch_array($query2))
        {
        $spend_product_name = $data2["spend_product_name"];
        $spend_product_qantity = $data2["spend_product_quantity"];
        $spend_product_entry_date = $data2["spend_product_entry_date"];

        echo "<h2>$data_list[$spend_product_name]</h2>";
        echo "<table border='1'>
            <tr>
                <td>Spend date</td>
                <td>Amount</td>
            </tr>
            <tr>
                <td>$spend_product_entry_date</td>
                <td>$spend_product_qantity</td>
            </tr>
        </table>";
        }

    
    }
    ?>

</body>
</html>
<?php
}
else{
    header("location:login.php");
}
?>
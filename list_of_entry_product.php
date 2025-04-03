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
    <title>List of Store Product</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM store_product";
    $query = $conn->query($sql);

    echo "<table border='1'><tr><th>Product Name</th><th>Quientity</th><th>Entry Date</th><th>Action</th></tr>";
    while($data = mysqli_fetch_assoc($query))
    {
        $store_product_id = $data["store_product_id"];
        $store_product_name = $data["store_product_name"];
        $store_product_quientity = $data["store_product_quientity"];
        $store_product_entry_date = $data["store_product_entry_date"];


        echo "<tr>
                <td>$data_list[$store_product_name]</td>
                <td>$store_product_quientity</td>
                <td>$store_product_entry_date</td>
                <td><a href='edit_store_product.php?id=$store_product_id'>Edit</a></td>
            </tr>";
    }
    echo "</tr></table>"


    ?>
    
</body>
</html>
<?php
}
else{
    header("location:login.php");
}
?>
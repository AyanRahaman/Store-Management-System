<?php
//For connecting with the database
require "connection.php";

$cat_sql = "SELECT * FROM category";
$cat_query = $conn->query($cat_sql);

$data_list = array();

while($cat_data = mysqli_fetch_assoc($cat_query))
{
$category_id = $cat_data["category_id"];
$category_name = $cat_data["category_name"]; 

$data_list[$category_id] = $category_name; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Product</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM product";
    $query = $conn->query($sql);

    echo "<table border='1'><tr><th>Name</th><th>Category</th><th>Code</th><th>Action</th></tr>";
    while($data = mysqli_fetch_assoc($query))
    {
        $product_id = $data["product_id"];
        $product_name = $data["product_name"];
        $product_category = $data["product_category"];
        $product_code = $data["product_code"];


        echo "<tr>
                <td>$product_name</td>
                <td>$data_list[$product_category]</td>
                <td>$product_code</td>
                <td><a href='edit_product.php?id=$product_id'>Edit</a></td>
            </tr>";
    }
    echo "</tr></table>"


    ?>
    
</body>
</html>
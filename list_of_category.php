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
    <title>List of category</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM category";
    $query = $conn->query($sql);

    echo "<table border='1'><tr><th>Category</th><th>Date</th><th>Action</th></tr>";
    while($data = mysqli_fetch_assoc($query))
    {
        $category_id = $data["category_id"];
        $category_name = $data["category_name"];
        $category_entrydate = $data["category_entrydate"];

        echo "<tr>
                <td>$category_name</td>
                <td>$category_entrydate</td>
                <td><a href='edit_category.php?id=$category_id'>Edit</a></td>
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
<?php
//For connecting with the database
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <?php
    if(isset($_GET["category_name"]))
    {
        $category_name =  $_GET["category_name"];
        $category_entrydate =  $_GET["category_entrydate"];


        $sql = "INSERT INTO category (category_name,category_entrydate)
        VALUES('$category_name','$category_entrydate')";


        if($conn->query($sql) == TRUE)
        {
            echo "data succesfully submitted";
        }
        else
        {
            echo "Data not inserted, something went wrong";
        }



    }

    ?>
    <form action="" method="GET">
        Category : <br>
        <input type="text" name="category_name"><br><br>
        Category Entry Date : <br>
        <input type="date" name="category_entrydate"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
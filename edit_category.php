<?php
//For connecting with the database
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <?php
        if(isset($_GET["id"]))
        {
            $getid = $_GET["id"];

            $sql = "SELECT * FROM category WHERE category_id = '$getid'";

            $query = $conn->query($sql);

            if($data = mysqli_fetch_assoc($query))
            {
                $category_id = $data["category_id"];
                $category_name = $data["category_name"];
                $category_entrydate = $data["category_entrydate"];

            }


        }


       if(isset($_GET["category_name"]))
       {
            $new_category_id = $_GET["category_id"];
            $new_category_name = $_GET["category_name"];
            $new_category_entrydate = $_GET["category_entrydate"];


            $sql1 = "UPDATE category SET category_name = '$new_category_name', category_entrydate = '$new_category_entrydate'
            WHERE category_id = '$new_category_id'";
            

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
        Category : <br>
        <input type="text" name="category_name" value="<?php echo $category_name; ?>"><br><br>
        Category Entry Date : <br>
        <input type="date" name="category_entrydate" value="<?php echo $category_entrydate; ?>"><br><br>
        <input type="text" name="category_id" value="<?php echo $category_id; ?>" hidden>
        <input type="submit" value="submit">
    </form>
</body>
</html>
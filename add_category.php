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
    <title>Add Category</title>
     <!-- font Awesome CDN -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container bg-light"> <!-- @Container Start -->
            <div class="container-fluid border-bottom border-success"><!-- @Top Start -->
                <?php include "topbar.php"; ?>
            </div><!-- @End of Top -->
            <div class="container-fluid">
                <div class="row"> <!-- @Row Start-->
                    <div class="col-sm-3 bg-light p-0 m-0"><!-- @Left Start-->
                       <?php include "leftbar.php"; ?>
                    </div> <!-- @End of Left -->
                    <div class="col-sm-9 border-start border-success"> <!-- @Right Start -->
                        <div class="container p-4 m-4"><!-- @Container Start-->
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
                                <input type="submit" value="submit" class="btn btn-success">
                            </form>
                            </div><!-- @End of Container-->
                    </div><!-- @End of Right -->
                </div><!-- @End of row -->
            </div>
            <div class="container-fluid border-top border-success"><!-- @Start of Bottom -->
                <?php include "bottom.php"; ?>
            </div><!-- @End of Bottom -->
        </div><!-- @End of Container -->

</body>
</html>
<?php
}
else{
    header("location:login.php");
}
?>
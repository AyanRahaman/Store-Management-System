<?php
session_start();




$user_first_name = $_SESSION["user_first_name"];
$user_last_name = $_SESSION["user_last_name"];

if (!empty($user_first_name) && !empty($user_last_name)) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Store Management System</title>
        <!-- font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- bootstrap CDN  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <div class="row pt-4">
                            <div class="col-sm-3">
                                <a href="add_category.php"><i class="fas fa-folder-plus fa-5x text-success"></i></a>
                                <p>Add Category</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="list_of_category.php"><i class="fas fa-folder-open fa-5x text-success"></i></a>
                                <p>Category List</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="add_product.php"><i class="fas fa-box-open fa-5x text-success"></i></a>
                                <p>Add Product</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="list_of_product.php"><i class="fas fa-stream fa-5x text-success"></i></a>
                                <p>Product List</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-4">
                            <div class="col-sm-3">
                                <a href="add_store_product.php"><i class="fas fa-trash-restore fa-5x text-success"></i></a>
                                <p>Add Store Product</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="list_of_entry_product.php"><i class="fas fa-box fa-5x text-success"></i></a>
                                <p>Store Product List</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="add_spend_product.php"><i class="fas fa-plus-circle fa-5x text-success"></i></a>
                                <p>Add Spend Product</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="list_of_spend_product.php"><i
                                        class="fas fa-window-restore fa-5x text-success"></i></a>
                                <p>Spend Product List</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-4">
                            <div class="col-sm-3">
                                <a href="report.php"><i class="fas fa-chart-bar fa-5x text-success"></i></a>
                                <p>Report</p>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-4">
                            <div class="col-sm-3">
                                <a href="add_users.php"><i class="fas fa-user-plus fa-5x text-success"></i></a>
                                <p>Add User</p>
                            </div>
                            <div class="col-sm-3">
                                <a href="list_of_users.php"><i class="fas fa-users fa-5x text-success"></i></a>
                                <p>List of User</p>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>

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
} else {
    header("location:login.php");
}

?>
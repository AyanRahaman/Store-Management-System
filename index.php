<?php
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
    <title>Store Management System</title>
</head>
<body>
    <h1>Store Management System</h1>
    <h3><a href="logout.php">logout</a></h3>
</body>
</html>
<?php
}
else{
    header("location:login.php");
}

?>
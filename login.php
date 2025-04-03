<?php
session_start();

//For connecting with the database
require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
<?php
      
      if(isset($_POST["user_email"]))
       {
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];


        $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'";

        $query = $conn->query($sql);


        if(mysqli_num_rows($query) > 0)
        {
            $data = mysqli_fetch_array($query);

            $user_first_name = $data["user_first_name"];
            $user_last_name = $data["user_last_name"];

            $_SESSION["user_first_name"] = $user_first_name;
            $_SESSION["user_last_name"] = $user_last_name;

            header("location:index.php");
        }
        else{
            echo "not ok";
        }
       
            
       }
      

    ?>
    
    <form action="" method="POST">
        User's Email : <br>
        <input type="email" name="user_email"><br><br>
        User's Password : <br>
        <input type="password" name="user_password"><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
<?php

include "../dbconfig.php";

session_start();

if(isset($_POST['submit'])) {
    $opwd = mysqli_real_escape_string($conn,$_POST['opwd']);
    $npwd = mysqli_real_escape_string($conn,$_POST['npwd']);
    $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd']);

    if($opwd!="" || $npwd!="" || $cpwd!="") {
        if($npwd===$cpwd) {
            $sql_query = "SELECT id,password FROM users where email='".$_SESSION['useremail']."'";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
            if(password_verify($opwd,$row['password'])===true) {
                $pwd_cipher = password_hash($npwd,PASSWORD_BCRYPT);
                $sql_query="UPDATE users SET password='$pwd_cipher' WHERE id='".$row['id']."';";
                $result = mysqli_query($conn,$sql_query);
                if($result) {
                    header("Location:login.php");
                }
                else {
                    echo "<script>window.alert('Database error')</script>";
                }
            }
            else {
                echo "<script>window.alert('Old password entered did not match')</script>";
            }
        } 
        else {
            echo "<script>window.alert('New passwords entered did not match')</script>";
        }
    } else {
        echo "<script>window.alert('All fields are mandatory')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container {
            width: 50%;
            border: 3px solid gray;
            position: absolute;
            top: 10%;
            padding: 0;
            transform: translateY(-50%);
            transform: translateX(50%);
        }
        #form-header {
            background-color: cornflowerblue;
            margin: 0;
            position: static;
            text-align: center;
        }
        #form-header h2,h4 {
            margin: 0px;
            padding: 10px;
            color: white;
        }
        #form {
            position: relative;
            text-align: center;
        }
        #form input {
            width: 90%;
            padding: 10px;
            border: 1px solid gray;
            margin-top: 20px;
        }
        #form input[type="submit"] {
            width: 40%;
            background-color: cornflowerblue;
            color: white;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="form-header">
            <h2>Create a new account</h2>
            <h4>It's quick and easy.</h4>
        </div>
        <form id="form" method="post" action="changepwd.php"> 
            <input type="password" name="opwd" id="" placeholder="Enter current password" required>
            <input type="password" name="npwd" id="" placeholder="Enter new password" required>
            <input type="password" name="cpwd" id="" placeholder="Confirm new password" required>
            <input type="submit" name="submit" value="REGISTER" />
        </form>
    </div>
</body>
</html>
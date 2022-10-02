<?php

include "../dbconfig.php";

if(isset($_POST['submit'])) {
   
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd']);

    if($name!="" || $email!="" || $pwd!="" || $cpwd!="") {
        if($pwd===$cpwd) {
            $pwd_cipher = password_hash($pwd,PASSWORD_BCRYPT);
            $sql_query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$pwd_cipher')";
            $result = mysqli_query($conn,$sql_query);
            if($result) {
                header("Location:login.php");
            }
            else {
                echo "<script>window.alert('Database error')</script>";
            }
        } 
        else {
            echo "<script>window.alert('Passwords entered did not match')</script>";
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
        <form id="form" method="post" action="register.php">
            <input type="text" name="name" id="" placeholder="Enter your name" required>  
            <input type="email" name="email" id="" placeholder="Enter your email address" required>  
            <input type="password" name="pwd" id="" placeholder="Enter your password" required>
            <input type="password" name="cpwd" id="" placeholder="Confirm your password" required>
            <input type="submit" name="submit" value="REGISTER" />
        </form>
    </div>
</body>
</html>
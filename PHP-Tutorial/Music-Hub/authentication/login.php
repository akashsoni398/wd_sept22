<?php 

include "../dbconfig.php"; 

if(isset($_POST['submit'])) {
   
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

    if($email!="" || $pwd!="") {
        $sql_query = "SELECT count(*) as usercount FROM users where email='$email'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        if($row['usercount']!=0) {
            $sql_query = "SELECT name,email,password FROM users where email='$email'";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
            if(password_verify($pwd,$row['password'])===true) {
                session_start();
                $_SESSION['username'] = $row['name'];
                $_SESSION['useremail'] = $row['email'];
                header("Location:../index.php");
            }
            else {
                echo "<script>window.alert('Username or password did not match')</script>";
            }
        }
        else {
            echo "<script>window.alert('User does not exist')</script>";
        }
    }
    else {
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
            top: 20%;
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
            <h2>Login into Music Hub</h2>
            <h4>Stream your favourites</h4>
        </div>
        <form id="form" method="post" action="login.php">
            <input type="email" name="email" id="" placeholder="Enter your email address" required>  
            <input type="password" name="pwd" id="" placeholder="Enter your password" required>
            <input type="submit" name="submit" value="LOGIN" />
        </form>
    </div>
</body>
</html>
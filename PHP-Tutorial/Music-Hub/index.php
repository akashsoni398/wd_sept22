<?php
session_start();
include "dbconfig.php";

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <title>Music Hub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        #header {
            background-color: black;
            text-align: right;
        }
        #header>a  {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 13px;
        }
        #dropdown {
            display: inline-block;
            position: relative;
        }
        #dropdown button {
            font-family: sans-serif;
            background-color: darkgreen;
            color: white;
            border: none;
            font-size: 20px;
            padding: 5px 20px;
            font-weight: bold;
        }
        #dropdown-content {
            display: none;
            position: absolute;
            right: 0px;
            z-index:0;
            background-color: #999;
        }
        #dropdown-content a {
            white-space: nowrap;
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
        }
        #dropdown:hover #dropdown-content{
            display: block;
        }
        #dropdown-content a:hover {
            background-color: #666;

        }
        #logo-section {
            background-color: #fbc915;
            position: relative;
            z-index:-1;
        }
        img[src="assets/images/logo.gif"] {
            height: 150px;
            width: 150px;
        }
        #logo-section h1 {
            position: absolute;
            top: 10px;
            left: 160px;
            font-family: fantasy;
            font-weight: normal;
            font-size: 75px;
        }
        #logo-section p {
            position: absolute;
            top: 90px;
            left: 160px;
            font-size: 18.5px;
        }
        .right-align {
            position: absolute;
            top: 0;
            right: 0;
        }
        #logo-section form {
            margin-right: 40px;
            margin-top: 55px;
            display: flex;
        }
        #logo-section form input {
            border: none;
            height: 40px;
            font-size: 15px;
            padding: 15px;
            border-radius: 30px 0px 0px 30px;
        }
        #logo-section form button {
            border: none;
            height: 40px;
            border-radius: 0px 30px 30px 0px;
            background-color: white;
        }
        #menubar {
            position: relative;
            width: 100%;
            background-color: #333;
        }
        #menubar ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 0px 40px;
            padding: 0px;
        }
        #menubar ul li {
            list-style-type: none;
            display: block;
            padding: 10px;
        }
        #menubar ul a {
            color: white;
            font-size: 20px;
            white-space: nowrap;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="header">
        <a href="legal/pp.html">Privacy Policy</a>
        <a href="legal/tnc.html">Terms and Conditiions</a>

        <?php if(!isset($_SESSION['username'])) {?>
        <div id="dropdown">
            <button>LOGIN</button>
            <div id="dropdown-content">
                <a href="authentication/login.php">Login into existing account</a>
                <a href="authentication/register.php">Create a new account</a>
            </div>
        </div>

        <?php } else { ?>
        <div id="dropdown">
            <button><?php echo $_SESSION['username'] ?></button>
            <div id="dropdown-content">
                <a href="authentication/changepwd.php">Change password</a>
                <a href="index.php?logout=true">Logout</a>
            </div>
        </div>
        <?php } ?>

    </div>
    <div id="logo-section">
        <div class="left-align">
            <img src="assets/images/logo.gif" alt="MUSIC HUB"/>
            <h1>MUSIC HUB</h1>
            <p>------------------------------------------------<br>One stop shop for all your musical needs</p>
        </div>
        <div class="right-align">
            <form action="search.html">
                <input type="search" placeholder="start typing to search..."/>
                <button><i class="bi bi-search" style="font-size:15px; padding: 15px;"></i></button>
            </form>
        </div>
    </div>
    
    <div id="menubar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="recent.html">Recently Added</a></li>
            <li><a href="fav.html">Favourites</a></li>
            <li><a href="hits.html">New Hits</a></li>
            <li><a href="playlists.html">Playlists</a></li>
            <li><a href="about.html">About us</a></li>
        </ul>
    </div>
    <div id="page-content" style="margin: 40px 80px;">
        <H1 style="text-align: center;">SONGS</H1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php 
            $sql_query = "SELECT views,name,doa,album,views,singer,composer,songwriter,label,starring,image,link FROM music ORDER BY views desc;";
            $result = mysqli_query($conn,$sql_query);
            while($data=mysqli_fetch_array($result)) {
            ?>
            <div class="col">
                <div class="card h-100">
                <img src="assets/musicimg/<?php echo $data['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['name'] ?></h5>
                    <p class="card-text"><?php echo "Singer:".$data['singer']."<br>Songwriter:".$data['songwriter']."<br>Composer:".$data['composer']."<br>Label:".$data['label']."<br>Starring:".$data['starring'] ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?php echo "Views: ".$data['views'] ?></small>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div style="height: 50px;"></div>
    <div id="footer" style="position:fixed; bottom:0; background-color:black; color:white; width:100%">
        <div id="company-info"></div>
        <div id="legal-links"></div>
        <p>Copyright of Akash Soni</p>
    </div>
</body>
</html>
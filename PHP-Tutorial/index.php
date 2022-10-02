<?php
session_start();
$_SESSION['username'] = $_POST['username'];
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day
?>
<html> <body> <?php
If ( !isset ($_COOKIE[$cookie_name])) {
  		echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  		echo "Cookie '" . $cookie_name . "' is set!<br>";
  		echo "Value is: " . $_COOKIE[$cookie_name];
}
?> </body> </html>

<?php 

echo "Username is ",$_POST['username']," and password is ",$_POST['password'];
echo "Hello World" ;
//fsdkjdsbfkdfjdfdssdf

/* dsddfs
dsf
fsdf
sd
sdf */


$var='Akash Soni';
$str="43";
$bool=true;
$bool=false;
$num=32;

echo $str+$num;
print($str+$num);

echo "Hello\n","World";
$res=print("Hello"."World"."my");
echo $res;

$arr = ["Hello","World",3242243,true,false];
for($i=0;$i<count($arr);$i++) {
    echo $arr[$i];
}

$arrray = ["Name"=>"Akash","mob"=>98987987,"registered"=>true];
echo $arrray["Name"];

$a="20";
$b=20;

if($a>$b) {
    echo "<br>A is greater";
}
else if($b>$a) {
    echo "<br>B is greater";
}
else if($b===$a) {
    echo "Both are equal";
}
else {
    echo "invalid input";
}

$fav_color="blue";
switch($fav_color) {
    case "blue":
        echo "blue";
        break;
    case "blue":
        echo "fav colour is purple";
        break;
    case "red":
        echo "red";
        break;
    default:
        echo "colours did not match";
}


for($i=0;$i<=10;$i++) {
    echo "<br>",$i;
}

$i=100;
while($i>0) {
    echo "<br>",$i;
    $i--;
}


$i=1000;
do {
    echo "<br>",$i;
    $i++;
}
while($i<=100);

$arr1 = ["Hello","World",3242243,true,false];
$arr2 = ["Name"=>"Akash","mob"=>98987987,"registered"=>true];

foreach ( $arr2 as $value ) {
    echo $value;
}



$age=30;
$age%=10;

if(!isset($age)) {
    echo "Age not entered";
}

    function myfunc($a,$b) {
        return $a+$b;
    }

$sum = myfunc(10,20);
echo '$sum=',$sum;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sum ?></title>
</head>
<body>
<div style="background-color:red; position:absolute;height: 200px;width: 200px;" height="200px" width="200px">
    <?php 
    if(!isset($_POST['username'])) {
    ?>
        <button type="">LOGIN</button>
    <?php 
    } else {
    ?>
        <button type=""><?php echo $_POST['username']?></button>
    <?php 
    }
    ?>
</div>
</body>
</html>
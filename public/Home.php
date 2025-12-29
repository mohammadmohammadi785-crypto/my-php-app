<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
echo $_SESSION['user_id'];
include ("connect.php");
$dastor= "SELECT * FROM post";

if($connect->query($dastor)->num_rows==0){
    echo "<h1>Heare is some post</h1>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>You are sucessfully logged In</h1>
</body>
</html>
<?php }?>
<?php
$connect = new mysqli("localhost","root","","social-midia");
if($connect->connect_error){
    die("connection failed: ".$connect->connect_error);
}
?>
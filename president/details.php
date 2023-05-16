<?php



include("../login/connection.php");
include("../login/function.php");

$id= $_POST["id"];


$info = "select * from users where user_id = '$id' limit 1";
$req = mysqli_query($con, $info);
$user = mysqli_fetch_assoc($req);


echo json_encode($user);
die;
?>
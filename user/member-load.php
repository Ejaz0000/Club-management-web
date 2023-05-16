<?php


include("../login/connection.php");
include("../login/function.php");


$user_data = check_login($con);

$user_name = &$user_data['user_name'];
$user_id = &$user_data['user_id'];








?>
<?php



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "club";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

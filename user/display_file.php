<?php



include("../login/connection.php");
include("../login/function.php");

$id= $_POST["id"];
$data = "select * from calendar where id = '$id' limit 1";
$re = mysqli_query($con, $data);
$li = mysqli_fetch_assoc($re);

        $loc = $li['file'];

        if($loc == null){
            echo 0;
        }
		else{
           echo $loc;
        }


?>
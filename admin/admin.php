<?php

session_start();

include("../login/connection.php");
include("../login/function.php");


if(isset($_POST['update_robo'])){

    $r1 = "update users set president = NULL where president = 'robotics'";
    mysqli_query($con, $r1);
    

    $president = $_POST['robotics_pres_name'];
    $q1 = "update users set president = 'robotics' where user_name = '$president'";
    mysqli_query($con, $q1);

   
}

if(isset($_POST['update_app'])){

    $r2 = "update users set president = NULL where president = 'app'";
    mysqli_query($con, $r2);

$president = $_POST['app_pres_name'];
$q2 = "update users set president = 'app' where user_name = '$president'";
mysqli_query($con, $q2);


}
if(isset($_POST['update_eee'])){

    $r3 = "update users set president = NULL where president = 'eee'";
    mysqli_query($con, $r3);

$president = $_POST['eee_pres_name'];
$q3 = "update users set president = 'eee' where user_name = '$president'";
mysqli_query($con, $q3);


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <div class="header">
        
        <img src="logoCMS.jpeg" class="logo" alt="">
        <div class="nav">
        <a href="../user/userview.php">Home</a>
            <a href="../login/uiuLogin.php">Login</a>
            <a href="#">Contact</a>
            <a href="#">Notice</a>
        </div>
        <div class="search">
            <input type="text" placeholder=" Search...">
        </div>
        <div class="calendar">
            <img src="calender.png" alt="calender">
        </div>
    </div>




    <div class="content">


    <div class="container">

            <form action="" method="post" >
                <span class="icon-close"><ion-icon name="close"></ion-icon></span>

                <div class="title">Admin Panel</div>
                <div class="subtitle">Select presidents for the clubs</div>
                <div class="robo_div">
                    <span>Robotics club:</span>
                    <input type="text" name="robotics_pres_name">
                    <input type="submit" value="Submit" name="update_robo">
                </div>

                <div class="app_div">
                    <span>App forum:</span>
                    <input type="text" name="app_pres_name">
                    <input type="submit" value="Submit" name="update_app">
                </div>

                <div class="eee_div">
                    <span>EEE club:</span>
                    <input type="text" name="eee_pres_name">
                    <input type="submit" value="Submit" name="update_eee">
                </div>
                
               
            </form>

        </div>


    </div>

    <div class="footer">
        <h2 style="text-decoration: underline;">UIU Web site</h2>
        <h2>Quest for Excellence</h2>
        <img src="5.jpg" alt="logo">
    </div>


    <script type="text/javascript">

$(document).ready(function(){

$(document).on("click",".detail", function(){
    var event_id = $(this).data("id");
    var element = this ;
    
    $.ajax({

    url: "display_file.php",
    type: "POST",
    data : {id:event_id},
    success : function(data){

        if(data == 0){
            alert("no details");
        }
        else{
            
            location.href = data;
        }

    }
});
      

});

});
</script>
    
</body>
</html>
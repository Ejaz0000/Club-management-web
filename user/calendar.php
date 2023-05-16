<?php

session_start();

include("../login/connection.php");
include("../login/function.php");

$user_data = check_login($con);

$user_name = &$user_data['user_name'];


$query = "select * from calendar order by date desc";
$result = mysqli_query($con, $query);
$event_data = mysqli_fetch_all($result,MYSQLI_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

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
    <div class="user"><?php echo $user_name ?></div>





    <div class="content">

         <div class="calendar_div">

        <div class="title">Calendar</div>
        

        <table id="calendar_table">
            <tr>
              <th> Club</th>
              <th> Date</th>
              <th> Event</th>
              <th> Details</th>
            </tr>
            <?php foreach($event_data as $data){ ?>
            <tr>
              <td><?php echo $data['club_name'];?></td>
              <td><?php echo $data['date'];?></td>
              <td><?php echo $data['event'];?></td>
              <td><button class="detail" data-id="<?php echo $data['id']?>">Details</button></td>
            </tr>
            <?php } ?>  
            
            
        </table>
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
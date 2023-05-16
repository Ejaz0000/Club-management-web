<?php
session_start();

include("../login/connection.php");
include("../login/function.php");


$user_data = check_login($con);

$user_name = &$user_data['user_name'];
$user_president = &$user_data['president'];

if($user_president == 'robotics'){
    $join = "select * from join_req where club = 'robotics' ";
}

if($user_president == 'app'){
    $join = "select * from join_req where club = 'app_forum' ";
}

if($user_president == 'eee'){
    $join = "select * from join_req where club = 'eee' ";
}


$re = mysqli_query($con, $join);
$list = mysqli_fetch_all($re,MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <title>Document</title>
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

         <div class="request">

            <div class="title">Robotics club requests</div>
        <div class="subtitle">Number of requests-</div>

        <table id="members">
            <tr>
              <th> Name</th>
              <th> Payment</th>
              <th> Trans ID</th>
              <th> Approve</th>
              <th> Details</th>
            </tr>
            <?php foreach($list as $data){ ?>
            <tr>
              <td><?php echo $data['user_name'];?></td>
              <td>Paid</td>
              <td><?php echo $data['code'];?></td>
              <td><button class="approve" data-id="<?php echo $data['user_id']?>">Approve</button></td>
              <td><button class="detail" data-id="<?php echo $data['user_id']?>">Details</button></td>
            </tr>
            <?php } ?>  
            
        </table>
         </div>

    </div>

    <div class="detail_container">
    <span class="icon-close" id="jclose"><ion-icon name="close"></ion-icon></span>

    <div class="title2">Details</div>

    <table id="info_table">
                
    
             <tr> <td>  <span>ID</span>  </td> <td>: <span class="iid"></span></td></tr>
     
             <tr> <td>  <span>Name</span> </td> <td>: <span class="iname"></span></td></tr>

             <tr>  <td> <span>Email</span> </td> <td>: <span class="iemail"></span></td></tr>
    
              <tr> <td> <span>Phone</span> </td><td>: <span class="iphone"></span></td> </tr>
     
             <tr>  <td> <span>Department</span> </td> <td>: <span class="idep"></span></td></tr>
     
              <tr> <td> <span>Member of club</span> </td> <td>: <span class="iclub"></span></td></tr>
     
              

     
     
    </table>
    </div>

    <div class="footer">
        <h2 style="text-decoration: underline;">UIU Web site</h2>
        <h2>Quest for Excellence</h2>
        <img src="5.jpg" alt="logo">
    </div>
    
    <script type="text/javascript">

$(document).ready(function(){

    let container = document.querySelector(".detail_container");

$(document).on("click",".approve", function(){
    var user_id = $(this).data("id");
    var element = this ;
    
    $.ajax({

    url: "approve.php",
    type: "POST",
    data : {id:user_id},
    success : function(data){

        if(data == 1){
            $(element).closest("tr").fadeOut();
        }
        else{
            alert("cannot approve");
        }

        
        
    }
}); 

});

$(document).on("click",".detail", function(){
    var user_id = $(this).data("id");
   
    

    $.ajax({

    url: "details.php",
    type: "POST",
    data : {id:user_id},
    success : function(data){
     var array = JSON.parse(data);
     
    $(".iid").text(array['user_id']);
    $(".iname").text(array['user_name']);
    $(".iemail").text(array['email']);
    $(".iphone").text(array['phone']);
    $(".idep").text(array['department']);
    
        
    if(array['club3']=='yes'){
        $(".iclub").append(" robotics"); 
    }
    if(array['club2']=='yes'){
        $(".iclub").append(" app forum"); 
    }
    if(array['club1']=='yes'){
        $(".iclub").append(" eee"); 
    }
    if(array['club3']=='no' && array['club2']=='no' && array['club1']=='no'){
        $(".iclub").append(" none"); 
    }
}

});  
    container.style.display = "block";

});

let iconClose = document.querySelector("#jclose");
        iconClose.addEventListener("click",function(){
        container.style.display = "none";
    
        });

});





</script>

</body>
</html>
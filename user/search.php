<?php 
session_start();

include("../login/connection.php");
include("../login/function.php");

	$user_data = check_login($con);

	$str = $_GET["search"];
	$ser ="select * from users where (user_name = '$str' OR department = '$str')";
	$result = mysqli_query($con, $ser);
	$datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

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




    <div class="content">

         <div class="search_div">

        <div class="title">Search Result</div>
       

            <?php foreach($datas as $data){ ?>
            <div class="member"><span class="mname"><?php echo $data['user_name'];?></span></span><span class="mdep"><?php echo $data['department'];?></span><span><button class="detail" data-id="<?php echo $data['user_id']?>">Details</button></span></div>
            <?php } ?>  
        

       
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


    $(document).on("click",".detail", function(){
    var user_id = $(this).data("id");
   
    

    $.ajax({

    url: "../president/details.php",
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
<?php

session_start();

	include("../login/connection.php");
	include("../login/function.php");

  $user_data = check_login($con);
	
  $user_name = $user_data['user_name'];
	$user_id = $user_data['user_id'];
	

	$query = "select * from users where user_id IN (select user_id from club_1)";
	$result = mysqli_query($con, $query);
	$members= mysqli_fetch_all($result,MYSQLI_ASSOC);

	$qu = "select * from users where president ='eee'limit 1";
	$res = mysqli_query($con, $qu);
	$pres = mysqli_fetch_assoc($res);

  $msql = "select * from message where group_id = 101 order by message_id asc";
	   $rl = mysqli_query($con, $msql);
	   $mesgs = mysqli_fetch_all($rl,MYSQLI_ASSOC);

   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
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
                <form method="get" action = "search.php">
                <input type="text" name="search" placeholder=" Search...">
                </form>
            </div>
        <div class="calendar">
            <img src="calender.png" alt="calender">
        </div>
    </div>
    <div class="user"><?php echo $user_name ?></div>


    <div class="bg_e">
       <div class="title">EEE Club</div>
       <div class="president-card">
           <div class="pres-tag">President</div>
           <div class="pres-info"><span class="pres-id"><?php echo $pres['user_id'];?></span><br><span class="pres-dep"><?php echo $pres['department'];?></span><br><span class="pres-phone"><?php echo $pres['phone'];?></span><br><span class="pres-email"><?php echo $pres['email'];?></span>
        </div>
           <div class="pres-name"><?php echo $pres['user_name'];?></div>
       </div>
    </div>
    <div class="bg2_e">

        <div id="members">
            <div class="title2">Members</div>
            <?php foreach($members as $data){ ?>
            <div class="member"><span class="mname"><?php echo $data['user_name'];?></span><span class="memail"><?php echo $data['email'];?></span><span class="mdep"><?php echo $data['department'];?></span></div>
            <?php } ?>  
        </div>

    </div>

    <div class="chat-box">
        <div class="chat-header">
          Chat
        </div>
        <div class="chat-body">
        <?php foreach($mesgs as $mesg){ ?>
          <?php if($mesg['from_id'] == $user_id){ ?>
            
            <div class="div-1">
          <div class="message sent">
            <div class="message-text">
            <?php  echo $mesg['text'];?>
            </div>
          </div>
        </div>
        
        <?php } 

		else{ ?>
          <div class="div-2">
          <small style="color: rgb(90, 84, 72);"> <?php  echo $mesg['from_name'];?> </small>
          <div class="message received">
            <div class="message-text">
            <?php echo $mesg['text'];?> 
            </div>
          </div>
          </div>
          <?php } ?>  
  
        
        <?php } ?>

        <div class="new"></div>
		
        </div>
		
        <div class="chat-footer">
          <input class="textfield" type="text" placeholder="Type a message...">
          <button class="send">Send</button>
        </div>
      </div>



    <div class="footer">
        <h2 style="text-decoration: underline;">UIU Web site</h2>
        <h2>Quest for Excellence</h2>
        <img src="5.jpg" alt="logo">
    </div>
    


    <script type="text/javascript">

$(document).ready(function(){
    
  var d = $('.chat-body');
  d.scrollTop(d.prop("scrollHeight"));

    var jcontainer = document.querySelector(".join-container");

$(".send").on("click",function(e){

    e.preventDefault();

    var user_id = '<?php echo $user_id; ?>';
    var user_name = '<?php echo $user_name; ?>';
    var group_id = 101;
    var text = $(".textfield").val();
    
    $.ajax({

    url: "messages.php",
    type: "POST",
    data : {msg:text,id:user_id,name:user_name,group:group_id},
    success : function(data){
      //$(".chat-body").html(data);
        $(".new").before(data);
        $(".textfield").val("");

    }
});
});

    
});


</script>
</body>
</html>
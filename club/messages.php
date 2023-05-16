<?php 
session_start();

	include("../login/connection.php");
	include("../login/function.php");

    $msg = $_POST['msg'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $group = $_POST['group'];
		date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-y h:i:s');

        $output = "";

        if(!empty($msg)){

            if($group == 103){
            $sql = "insert into message (from_id, from_name, text, msg_time,group_id)  values ('$id','$name', '$msg', '$date', 103)";
            $r = mysqli_query($con, $sql);


            $output .= "<div class=\"div-1\"><div class=\"message sent\"><div class=\"message-text\">{$msg}</div></div></div> ";
            }
            if($group == 102){
                $sql = "insert into message (from_id, from_name, text, msg_time,group_id)  values ('$id','$name', '$msg', '$date', 102)";
                $r = mysqli_query($con, $sql);
    
    
                $output .= "<div class=\"div-1\"><div class=\"message sent\"><div class=\"message-text\">{$msg}</div></div></div> ";
                }
            
                if($group == 101){
                    $sql = "insert into message (from_id, from_name, text, msg_time,group_id)  values ('$id','$name', '$msg', '$date', 101)";
                    $r = mysqli_query($con, $sql);
        
        
                    $output .= "<div class=\"div-1\"><div class=\"message sent\"><div class=\"message-text\">{$msg}</div></div></div> ";
                    }

        }


       // $msql = "select * from message where group_id = 103 order by message_id asc";
	  //  $rl = mysqli_query($con, $msql);
	  // $mesgs = mysqli_fetch_all($rl,MYSQLI_ASSOC);
      // $output = "";

        


      //  foreach($mesgs as $mesg){
      //      if($mesg['from_id'] == $user_id){
       //     $output .= "<div class=\"div-2\"><div class=\"message sent\"><div class=\"message-text\">{$mesg['text']}</div></div></div> ";

      //      }
       //     else{
      //          $output .= " <div class=\"div-2\"><div class=\"message received\"><div class=\"message-text\"> {$mesg['text']} </div></div></div>";
      //      }
      //  }

                   
        
        

       echo $output;

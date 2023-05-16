<?php 
    session_start();

	include("../login/connection.php");
	include("../login/function.php");

	$user_data = check_login($con);

	$user_name = &$user_data['user_name'];
	$user_id = &$user_data['user_id'];

    $club_name = $_POST['club_name'];
	$trans_id = random_num(8);
    

    if($club_name=="robotics"){
		$join = "insert into join_req (user_id,user_name,club,code) values ('$user_id','$user_name','$club_name','$trans_id')";
		
		mysqli_query($con, $join);
        echo $trans_id;
	}

    if($club_name=="app_forum"){
		$join = "insert into join_req (user_id,user_name,club,code) values ('$user_id','$user_name','$club_name','$trans_id')";
		
		mysqli_query($con, $join);
        echo $trans_id;
	}

    if($club_name=="eee"){
		$join = "insert into join_req (user_id,user_name,club,code) values ('$user_id','$user_name','$club_name','$trans_id')";
		
		mysqli_query($con, $join);
        echo $trans_id;
	}


?>
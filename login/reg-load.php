<?php

session_start();

include("connection.php");
include("function.php");

        $user_name = $_POST['sname'];
		$password = $_POST['spassword'];
        $email = $_POST['semail'];
        $department = $_POST['sdepartment'];
        $phone= $_POST['sphone']; 

        if(!empty($user_name) && !empty($password) && !empty($email) && !empty($phone) && !empty($department) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(10);
			$query = "insert into users (user_id,user_name,password,email,department,phone) values ('$user_id','$user_name','$password','$email','$department','$phone')";

			mysqli_query($con, $query);

    


		    echo "registered";
			die;

		
		}else
		{
			echo "Enter some valid information!";
		}


?>


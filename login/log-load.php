<?php

session_start();

include("connection.php");
include("function.php");

      $email = $_POST['lemail'];
		$password = $_POST['lpassword'];


        if(!empty($email) && !empty($password))
		{    

			if($email == "admin@gmail.com"){

			
                
                $que= "select * from admin ";
                $res = mysqli_query($con, $que);
                if($res && mysqli_num_rows($res) > 0)
				{

					$admin_data = mysqli_fetch_assoc($res);
                    if($admin_data['password'] == $password)
                        {
    
                            echo "admin";
                            die;
                        } 
                        
                }
                
            }
        

           

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

           

			
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);


                    if($user_data['password'] === $password)
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						echo "loged in";
					}

                    else{
                        echo "wrong password!";
                    }
					
					
				}
			
                else{
			         echo "wrong email or password!";
                }
		}else
		{
			echo "Enter email and password!";
		}


?>
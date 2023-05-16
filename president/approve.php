<?php



include("../login/connection.php");
include("../login/function.php");

$id= $_POST["id"];
$join = "select * from join_req where user_id = '$id' limit 1";
$re = mysqli_query($con, $join);
$li = mysqli_fetch_assoc($re);

        $user_ids = $li['user_id'];
		$user_names = $li['user_name'];
		$user_club = $li['club'];

		if($user_club=="robotics"){
		$query = "insert into club_3 (user_id,user_name) values ('$user_ids','$user_names')";
		$up = "update users set club3 = 'yes' where user_id = '$user_ids'";
		mysqli_query($con, $query);
		mysqli_query($con, $up);
		}
		if($user_club=="app_forum"){
			$query = "insert into club_2 (user_id,user_name) values ('$user_ids','$user_names')";
			$up = "update users set club2 = 'yes' where user_id = '$user_ids'";
			mysqli_query($con, $query);
			mysqli_query($con, $up);
			}
		if($user_club=="eee"){
				$query = "insert into club_1 (user_id,user_name) values ('$user_ids','$user_names')";
				$up = "update users set club1 = 'yes' where user_id = '$user_ids'";
				mysqli_query($con, $query);
				mysqli_query($con, $up);
				}


$del = "delete from join_req where user_id = '$id'";
if( mysqli_query($con, $del)){
    echo 1;
}
else{
    echo 0;
}


?>


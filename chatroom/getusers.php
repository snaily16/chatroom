<?php

include("base.php");

	 	$all_users = "select * from user_details";
	 	$run_all = mysqli_query($conn, $all_users);
	 	while($row_user = mysqli_fetch_array($run_all)){
	 		$user_id = $row_user['id'];
	 		$username = $row_user['fname'];
	 		$userlname = $row_user['lname'];
	 		$user_img = $row_user['image'];

	 		if($user_id != $user)
	 		{
	 		echo "
	 			<li class='list-group-item'>
	 			<div>
	 				<p><a href='chat.php?user_id=$user_id'><img src='uploads/$user_img' style='width:20%;'>$username $userlname</a></p>
	 			</div>
	 			</li>
	 		";
	 	}
	 	}
	 

?>
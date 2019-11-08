<?php

include("base.php");

	 	$all_users = "select * from user_details";
	 	$run_all = mysqli_query($conn, $all_users);
	 	while($row_user = mysqli_fetch_array($run_all)){
	 		$user_id = $row_user['id'];
	 		$username = $row_user['fname'];
	 		$userlname = $row_user['lname'];
	 		$user_img = $row_user['image'];
	 		$abtme = $row_user['aboutMe'];

	 		if($user_id != $user)
	 		{
	 		echo "
	 			<li class='list-group-item'>
	 			<center>
	 			<div class='card' style='width:250px; height:200px'>
				    <img class='card-img-top' src='uploads/$user_img' style='width:25%';>
				    <div class='card-body'>
				    	<h4>$username $userlname<h4>
				    	<h6>$abtme<h6>
				    	<a href='friends.php?user_id=$user_id' class='btn btn-primary'>View Profile</a>
				    </div> 
				    
				  </div>
	 			</center>
	 			</li>
	 		";
	 	}
	 	}
	 

?>
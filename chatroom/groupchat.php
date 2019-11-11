<?php
include("base.php");
	 session_start();
	 $user=$_SESSION['tempuser'];
	 if ($_SESSION['tempuser']) {
		 
		$q1 = "select * from user_details where id='$user'";
		$run_q1 = mysqli_query($conn,$q1);
		$row = mysqli_fetch_array($run_q1);
		
		$name = $row['fname'];
		$dept = $row['dept'];
		$uimg = $row['image'];           	
?>


<html lang="en">
	<head>
        <title>Profile Page</title>
        
        <!--CSS styles-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="sidenav_style.css">
		<link rel="stylesheet" href="chatstyle.css">
     
    </head>
	

    <body>

        <div id="wrapper">
            <?php include("sidenav.html"); ?>
			
			<div class="main">
			
				<div class="container-fluid">
					<h2>GroupChat</h2>
					<div class="container-fluid ">
						<div class="row">
						
							<div class="col-md-9">
								<?php

									echo "<h3>$dept</h3>";
									$q_msg = "Select * from chat where recv_id = '$dept' order by 1 ASC";
									$run_msg = mysqli_query($conn, $q_msg);

									while($row = mysqli_fetch_array($run_msg)){
										$s_user = $row['send_id'];
										$msg = $row['message'];
										$msg_time = $row['time'];

								?>
								<ul class="list-group">


									<?php

										if($user==$s_user){
											echo " 
												<div class='container chatcontainer'>
											<img src='uploads/$uimg'; alt='Avatar' style='width:15%;'>
								  			<p>$msg</p>
								  			<span class='time-right'><small>$msg_time</small></span><br>
								  			<span class='time-right'>$name</span>
								  		
											";
										} 
									
										else {
											$q_user = "Select * from user_details where id = '$s_user'";
											$run_u = mysqli_query($conn, $q_user);
											$row_u = mysqli_fetch_array($run_u);
		
											$sid = $row_u['id'];
											$simg = $row_u['image'];
											$sname = $row_u['fname'];

											echo "<div class='container chatcontainer darker'>
											<img src='uploads/$simg'; alt='Avatar' style='width:15%;'>
								  			<p>$msg</p>
								  			<span class='time-right'><small>$msg_time</small></span><br>
								  			<span class='time-right'>$sname</span>
											";
										} 
									?>
								</div>
								</ul>
								
								<?php
							}
							?>
								<div class="row">
									<center>
									<form method="POST" action="groupchat.php">
										<input autocomplete="off" type="text" name="msg_content" placeholder="Write your message.....">
										<input type="submit" name="send" value="Send">
									</form>
									</center>
								</div>
								<?php

								if(isset($_POST['send'])){
					           		$msg = $_POST['msg_content'];
					           		if($msg == ""){
					           			echo "
					           				<div class='alert alert-danger'>
					           					<strong>Enter message</strong>
					           			";
					           		}
					           		else {
					           			$q_insert = "insert into chat (send_id, recv_id, message) values ('$user', '$dept', '$msg')";
					           			$run_qi = mysqli_query($conn, $q_insert);

					           		}
					           	}
           						?>
							
							</div>
							
							
							<div class="col-md-3">
								<h4>Group Members</h4>
								<ul class="list-group">
									<?php 
									$all_users = "select * from user_details where dept='$dept'";
								 	$run_all = mysqli_query($conn, $all_users);
								 	while($row_user = mysqli_fetch_array($run_all)){
								 		$user_id = $row_user['id'];
								 		$username = $row_user['fname'];
								 		$userlname = $row_user['lname'];
								 		$user_img = $row_user['image'];
								 		$abtme = $row_user['aboutMe'];

								 		echo "
								 			<li class='list-group-item'>
			
								 			<center>
								 			<div class='card' style='width:300px; height:180px; background:	#F0FFFF; padding:10px'>
											    <img class='card-img-top' src='uploads/$user_img' style='width:15%; border-radius: 50%;';>
											    <div class='card-body'>
											    	<h4>$username $userlname<h4>
											    	<h6>$abtme<h6>
											    </div> 
											    
											</div>
								 			</center>
								 			</li>
								 		";
								 	
								 	}
									 ?>
								</ul>
							</div>
						</div>
					</div>			
				</div>
			</div>
        </div>        
           
                     
       
</body>
</html>

<?php
}
else{
	echo('You are not logged in');
	header("location:login.html");
}
?>
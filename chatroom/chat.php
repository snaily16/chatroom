<?php
include("base.php");
	 session_start();
	 $user=$_SESSION['tempuser'];
	 if ($_SESSION['tempuser']) {
		 
		$q1 = "select * from user_details where id='$user'";
		$run_q1 = mysqli_query($conn,$q1);
		$row = mysqli_fetch_array($run_q1);
		
		$name = $row['fname'];
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
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="chatstyle.css">
     
    </head>
	

    <body>

        <div id="wrapper">
            <?php include("sidebar.html"); ?>
			
			<div id="main">
			
				<div class="container-fluid">
					<h2>Chat Messages</h2>
					<div class="container-fluid ">
						<div class="row">

						
							<div class="col-md-8">

								<!-- getting the user data on which user click -->
							<?php 
								if(isset($_GET['user_id'])){
									$uid = $_GET['user_id'];
									$q2 = "Select * from user_details where id = '$uid'";
									$run_q2 = mysqli_query($conn, $q2);
									$row_user = mysqli_fetch_array($run_q2);
									$rname = $row_user['fname'];
									$rimg = $row_user['image'];

								echo "<h3>$rname $uid</h3>";
								}
								else{
									$uid=NULL;
								}
								echo "<p>$uid</p>";
								$q_msg = "Select * from chat where (send_id='$user' AND recv_id = '$uid') 
								OR (send_id='$uid' AND recv_id='$user') order by 1 ASC";
								$run_msg = mysqli_query($conn, $q_msg);

								while($row = mysqli_fetch_array($run_msg)){
									$s_user = $row['send_id'];
									$r_user = $row['recv_id'];
									$msg = $row['message'];
									$msg_time = $row['time'];
 								
							?>
								<ul>


									<?php
										if($user==$s_user AND $uid==$r_user){
											echo " 
												<div class='container'>
											<img src='uploads/$uimg'; alt='Avatar' style='width:10%;'>
								  			<p>$msg</p>
								  <span class='time-right'>$user <small>$msg_time</small></span>
								  		
											";
										} 
									
										else if($user==$r_user AND $uid==$s_user){
											echo "<div class='container darker'>
											<img src='uploads/$rimg'; alt='Avatar' style='width:10%;'>
								  			<p>$msg</p>
								  <span class='time-right'>$uid <small>$msg_time</small></span>
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
									<form method="POST" action="chat.php">
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
					           		else if($uid != NULL){
					           			$q_insert = "insert into chat (send_id, recv_id, message) values ('$user', '$uid', '$msg')";
					           			$run_qi = mysqli_query($conn, $q_insert);

					           		}
					           	}
           	?>
							
							</div>
							
							
							<div class="col-md-4">
								<ul>
									<?php include("getusers.php"); ?>
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
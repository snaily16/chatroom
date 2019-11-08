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
        <title>Friends Page</title>
        
        <!--CSS styles-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Pacifico|Yeon+Sung&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="chatstyle.css">
     
    </head>
	

    <body>

        <div id="wrapper">
            <?php include("sidebar.html"); ?>
			
			<div id="main">
			
				<div class="container-fluid">
					<h2 style="padding-top: 20px;">View Profiles</h2><br>
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
									
									$namefn = $row_user['fname'];
								 	$nameln = $row_user['lname'];
									$email = $row_user['email'];
							        $supervisor = $row_user['supervisor_name'];
									$file_name = $row_user['image'];
									$dob = $row_user['dob'];
									$abtme = $row_user['aboutMe'];
									$dept = $row_user['dept'];
									}
									else{
										$uid='';
										$namefn = '';
								 	$nameln = '';
									$email = '';
							        $supervisor = '';
									$file_name = '';
									$dob = '';
									$abtme = '';
									$dept = '';
									}
									?>

								<ul class="list-group">

								<div class="row">
									<h4 class="text-info" style="font-family: 'Yeon Sung', cursive;"><?php echo $abtme; ?></h4>
                                        <hr>
                                     
								<div class="table-responsive">
									<table class="table table-borderless" style="font-family: 'Pacifico', cursive;">
										<tr>
										<td>Name</td>
										<td><?php echo $namefn,' ' ,$nameln; ?></td>
										</tr>
										<tr>
										<td>Department</td>
										<td><?php echo $dept; ?></td>
										</tr>
										<tr>
										<td>Supervisor's Name</td>
										<td><?php echo $supervisor; ?></td>
										</tr>
										<tr>
										<td>Roll no.</td>
										<td><?php echo $uid; ?></td>
										</tr>
										<tr>
										<td>Email id</td>
										<td><?php echo $email; ?></td>
										</tr>
										<tr>
										<td>Date of Birth</td>
										<td><?php echo $dob; ?></td>
										</tr>
										
										
									</table>
								</div>
								</div>
								
							
							</div>
							
							
							<div class="col-md-4">
								<h4>Users</h4>
								<ul class="list-group">
									<?php include("getuserprofile.php"); ?>
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
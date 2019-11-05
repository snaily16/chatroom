<?php
include("base.php");
	 session_start();
	 $user=$_SESSION['tempuser'];
	 if ($_SESSION['tempuser']) {
		 
		 		$query = "SELECT * from user_details where id='$user' "; 
	 	$details = mysqli_query($conn, $query);
	 	$val = mysqli_fetch_assoc($details);
	 	$namefn = $val['fname'];
	 	$nameln = $val['lname'];
		$email = $val['email'];
		$phone = $val['phone'];
        $supervisor = $val['supervisor_name'];
		$file_name = $val['image'];
		$dob = $val['dob'];
		?>
<html lang="en">
	<head>
        <title>Profile Page</title>
        
        <!--CSS styles-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
     

    </head>
	

    <body>

        <div id="wrapper">
            <?php include("sidebar.html"); ?>
            <div id="main">
            
                <div id="biography" class="page home" data-pos="home">
                    <div class="pageheader">
                        <div class="headercontent">
                            <div class="section-container">
                                
                                <div class="row">
                                    <div class="col-sm-2 visible-sm"></div>
                                    <div class="col-sm-7 col-md-4">
                                        <div class="biothumb">
                                            <?php echo "<img src=uploads/".$file_name."  class='img-responsive ' />" ?>
                                            <div class="overlay">
                                                
                                                <h2 class=""><b><?php echo $namefn, ' ', $nameln; ?></b></h2>
                                                
                                            </div> 
                                            
                                               
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix visible-sm visible-xs"></div>
                                    <div class="col-sm-12 col-md-7">
                                        <h3 class="title">About me</h3>
                                     
								<div class="table-responsive">
									<table class="table table-striped">
										<tr>
										<td>Name</td>
										<td><?php echo $namefn,' ' ,$nameln; ?></td>
										</tr>
										<tr>
										<td>Supervisor's Name</td>
										<td><?php echo $supervisor; ?></td>
										</tr>
										<tr>
										<td>Roll no.</td>
										<td><?php echo $user; ?></td>
										</tr>
										<tr>
										<td>Contact </td>
										<td ><?php echo $phone; ?></td>
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
<?php
include("base.php");
	 session_start();
	 $user=$_SESSION['tempuser'];
	 if ($_SESSION['tempuser']) {
if (isset($_POST['submitdetails'])){
$first=$_POST['fname'];
$last=$_POST['lname'];
$supname = $_POST['supervisor_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dept = $_POST['dept'];
$year = $_POST['year'];
$aboutme = $_POST['aboutme'];
$pic_file = $_FILES['pic_file']['name'];
$target = "uploads/".basename($_FILES['pic_file']['name']);

	 	$sql = "UPDATE user_details set fname='$first', lname='$last',
		supervisor_name='$supname', dept='$dept', email='$email', phone='$phone', 
		year='$year', image='$pic_file', aboutMe='$aboutme' where id='$user'";
	 	
	 	
	 	if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
			header("location: profile.php");
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
		
		  if (move_uploaded_file($_FILES['pic_file']['tmp_name'], $target)) {
      echo '<script type="text/javascript">';
       echo 'sweetAlert("Ok", "your file uploaded successfully", "success");';
       echo '</script>';
    }else{
     echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...Sorry", "file uploading failed!", "error");';
       echo '</script>';

    }
	
	 	
	}
		$query = "SELECT * from user_details where id='$user' "; 
	 	$details = mysqli_query($conn, $query);
	 	$val = mysqli_fetch_assoc($details);
	 	$namefn = $val['fname'];
	 	$nameln = $val['lname'];
		$supname = $val['supervisor_name'];
		$email = $val['email'];
		$phone = $val['phone'];
		$year = $val['year'];
		$pimg = $val['image'];
        $abtme = $val['aboutMe'];
        $dept = $val['dept'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <title>Profile Page</title>
        
        <!--CSS styles-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="sidenav_style.css">
       


    </head>
	
    <body>

        <div id="wrapper">
           <?php include("sidenav.html"); ?>
            <div class="main">
            
                <div id="biography" class="page home" data-pos="home">
                    <div class="pageheader">
                        <div class="headercontent">
                            <div class="section-container">
                                
                                <div class="row">
                                    <div class="col-sm-2 visible-sm"></div>
                                              
                                        
                                       <form method="POST" id="editdetails" action="editprof.php" enctype="multipart/form-data">
                                    <div class="clearfix visible-sm visible-xs"></div>
                                    <div class="col-sm-12 col-md-7">
                                        <h3 class="title">Edit Profile</h3>
                                       
										<h3><b><u>Personal Details</u></b></h3><br>
                                        <div class="col-sm-4">
                                        <p>First Name:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="text" name="fname" value="<?php echo $namefn; ?>"></p>
                                        </div>
										<div class="col-sm-4">
                                        <p>Last Name:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="text" name="lname" value="<?php echo $nameln; ?>"></p>
                                        </div>
                                        <div class="col-sm-4">
                                        <p>Department:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="text" name="dept" value="<?php echo $dept; ?>"></p>
                                        </div>
                                        <div class="col-sm-4">
                                        <p>Supervisor's name:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="text" name="supervisor_name" value="<?php echo $supname; ?>"></p>
                                        </div>
                                        <div class="col-sm-4">
                                        <p>Email id:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="email" name="email" value="<?php echo $email; ?>"></p>
                                        </div>
                                        <div class="col-sm-4">
                                        <p>Contact no:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="text" name="phone" value="<?php echo $phone; ?>"></p>
                                        </div>
										<div class="col-sm-4">
                                        <p>Year:</p>
                                        </div>
                                        <div class="col-sm-8">
                                        <p><input type="text" name="year" value="<?php echo $year; ?>"></p>
                                        </div>

										<div class="col-sm-4">
										<p>Profile image</p>
										</div>
										<div class="col-sm-8">
										<input type='file' name='pic_file' value="<?php echo 'uploads/'.$pimg; ?>" accept="image/*" onchange="readURLpic(this)";>
										</div>

                                        <div class="col-md-8">
                                        <textarea form="editdetails" placeholder="About me:" name="aboutme" form="editdetails" value="<?php echo $abtme; ?>"></textarea>
                                        </div>
										<br>
										<div class="col-md-12">
										<input type="submit" name="submitdetails" value="Submit">
										</div>
									       </div> 
									<br>									 
									 
									</form>

                                    
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
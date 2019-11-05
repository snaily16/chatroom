<?php
session_start();
include("base.php");
if (isset($_POST['register'])){
$user=$_POST['rollno'];
$pass=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$profileimg = 'default.png';
$dept=$_POST['department'];
$year='2019';
$dob=$_POST['dob'];
$supname='';

$sql = "Insert into user_details values ('$user','$fname','$lname','$dept',
										'$year','$supname','$pass','$email',
										'$phone','$profileimg','$dob')";
	 	
$que1 = mysqli_query($conn, $sql);
if ($que1) {
		    echo "Record updated successfully";
			//$_SESSION['tempuser']=$user;
			header("location: profile.php");
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
}
?>
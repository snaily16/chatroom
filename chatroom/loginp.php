<?php
session_start();
include("base.php");
if (isset($_POST['submit'])){
$user=$_POST['username'];
$pass=$_POST['password'];

$sql="select * from user_details where id='$user' and password='$pass'";
$que1 = mysqli_query($conn, $sql);

if(mysqli_num_rows($que1))
{
$_SESSION['tempuser']=$user; 
header("location: profile.php");
}
else
{
echo '<h1>Invalid username or password.</h1><br/> <a href="login.html">Try Login again...</a>';
}

if(!mysqli_query($conn, $sql))
{die('error:'.mysqli_error());}

mysqli_close($conn);}
?>

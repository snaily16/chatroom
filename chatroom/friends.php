<?php 
include("base.php");
	 session_start();
	 $user=$_SESSION['tempuser'];
	 if ($_SESSION['tempuser']) {
	
	
	if (isset($_POST['search'])){
	$friend = $_POST['friend'];
	$d = array();
	$sql = "Select * from user_details where fname='$friend' ";
	$details = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($details, MYSQLI_ASSOC);
	echo $row;
	}
	if (isset($_POST['addfriend'])){
		$fid = $_POST['fid'];
		$sql2 = "Insert into friends (sid, fid) values('$user', '$fid')";
		$add = mysqli_query($conn, $sql2);
		if(1)
		{
			echo "Friends added successfully";
		}
		else{
			echo "failed";
		}
		
	}
?>

<html lang="en">
	<head>
        <title>Profile Page</title>
        
        <!--CSS styles-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="chatstyle.css">
     
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
                                    <div class="clearfix visible-sm visible-xs"></div>
                                    <div class="col-sm-12 col-md-7">
                                        <h3 class="title">Friends List</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="section-container">
						<input type="text" name="friend">
						<input type="submit" name="search" value="search">
						<br>
						
						<input type="text" name="fid">
						<input type="submit" name="addfriend" value="Add Friend">
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
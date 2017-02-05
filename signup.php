<?php

if (!isset($_POST['sign_up'])){
	if(isset($_SESSION['Member_ID'])) {
		session_start();
		header("Location: chat.php");
		die();
	}
}
else {
		include_once 'config/connection.php';
			$query = "SELECT Email FROM Member WHERE Email=?";
			if($stmt = $con->prepare($query)) {
				$stmt->bind_Param("s", $_POST['Email']);
		$stmt->execute();
		$result = $stmt->get_result();
		$num = $result->num_rows;
		if($num===0) {
					$query = "INSERT INTO Member (F_Name,L_Name,Email,Phone_No,Grad_Year,Faculty,Degree_Type,Password)
					VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[Email]','$_POST[Phone]','$_POST[Year]','$_POST[Faculty]','$_POST[Degree]','$_POST[Password]')";
					mysqli_query($con,$query);
					$query = "SELECT Member_ID FROM Member WHERE Email = '$_POST[Email]'";
					$myrow = mysqli_query($con,$query)->fetch_assoc();
			$_SESSION['Member_ID'] = $myrow['Member_ID'];
			header("Location:chat.php");
			exit();
		} else {
			error_log("Email already in use");
			header("Location:signup.php?msg=bademail");
		}
	} else {
		echo "failed to prepare the SQL";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
			<meta name="author" content="VMS&amp;SN&amp;BB&amp;VH">
		<link rel="shortcut icon" href="img/favicon.png">
		<title>QThrive - Sign Up</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
	</head>
	<body>
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						<a class="navbar-brand" href="index.php"> <img src="img/QThrive.png" height="50"> <b>QThrive</b> </a>
					</div>
					<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php">Already a member?</a></li>
					</ul>
					</div>
				</div>
			</div>
		<div id="headerwrap" style="padding-top: 50px; min-height: 590px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<h1 style="text-align: center">Welcome aboard.</h1>
					</div>
					<div class="col-lg-6 col-lg-offset-3">
						<form name='signup' id='signup' action='signup.php' method='POST'>
							<div class="row" style="padding-bottom: 15px;">
								<div class="form-group">
									<div style='padding-right: 15px; padding-left: 15px;' class="col-md-6">
										<input style="width: 100%;" type="text" class="form-control" name="FirstName" id="FirstName" placeholder="First Name">
									</div>
									<div style='padding-right: 15px; padding-left: 15px;' class="col-md-6">
										<input style="width: 100%;" type="text" class="form-control" name="LastName" id="LastName" placeholder="Last Name">
									</div>
								</div>
							</div>
						 	<div class="form-group">
								<input style="width: 100%;" type="email" class="form-control" name="Email" id="Email" placeholder="Email Address">
								<script>
										var captured = /email=([^&]+)/.exec(window.location.href)[1];
										var result = captured ? captured : '';
										result = result.replace('%40','@');
										document.getElementById("Email").value = String(result);

								</script>
						  	</div>
							<div class="form-group">
								<input style="width: 100%;" type="text" class="form-control" name="Phone" id="Phone" placeholder="Phone #">
						 	</div>
							<div class="row" style="padding-bottom: 15px;">
								<div class="form-group">
									<div style='padding-right: 15px; padding-left: 15px;' class="col-md-3">
										<select style="width: 100%;" type="text" class="form-control" name="Degree" id="Degree">
												<option value="" selected disabled>Degree</option>
												<option>BA</option>
												<option>BSc</option>
												<option>BComm</option>
												<option>BComp</option>
												<option>BEd</option>
												<option>BEng</option>
												<option>MA</option>
												<option>MEd</option>
												<option>MSc</option>
												<option>MBA</option>
												<option>JD</option>
												<option>MD</option>
												<option>PhD</option>
										</select>
									</div>
										<div style='padding-right: 15px; padding-left: 15px;' class="col-md-6">
											<select style="width: 100%;" type="text" class="form-control" name="Faculty" id="Faculty">
												<option value="" selected disabled>Faculty / Department</option>
												<option>Anatomical Sciences</option>
												<option>Applied Economics</option>
												<option>Art History</option>
												<option>Astronomy and Astrophysics</option>
												<option>Biochemistry</option>
												<option>Biology</option>
												<option>Biomedical and Molecular Sciences</option>
												<option>Business Administration</option>
												<option>Business / Management</option>
												<option>Chemical Engineering</option>
												<option>Chemistry</option>
												<option>Civil Engineering</option>
												<option>Classics</option>
												<option>Commerce</option>
												<option>Computer Engineering</option>
												<option>Computing</option>
												<option>Drama</option>
												<option>Economics</option>
												<option>Education</option>
												<option>Electrical Engineering</option>
												<option>Engineering Chemistry</option>
												<option>Engineering Physics</option>
												<option>English Language and Literature</option>
												<option>Environmental Sciences</option>
												<option>Film and Media</option>
												<option>Fine Art</option>
												<option>French Studies</option>
												<option>Gender Studies</option>
												<option>Geography</option>
												<option>Geological Engineering</option>
												<option>Geological Sciences</option>
												<option>German</option>
												<option>Global Development Studies</option>
												<option>Health Sciences</option>
												<option>Health Studies</option>
												<option>History</option>
												<option>Humanities</option>
												<option>Indigenous Studies</option>
												<option>International Business</option>
												<option>International Studies</option>
												<option>Jewish Studies</option>
												<option>Kinesiology</option>
												<option>Law</option>
												<option>Linguistics</option>
												<option>Languages</option>
												<option>Life Sciences</option>
												<option>MBA</option>
												<option>Management</option>
												<option>Mathematics and Engineering</option>
												<option>Mathematics and Statistics</option>
												<option>Mechanical and Material Engineering</option>
												<option>Medicine</option>
												<option>Mining Engineering</option>
												<option>Music</option>
												<option>Neuroscience Studies</option>
												<option>Nursing</option>
												<option>Occupational Therapy</option>
												<option>Pathology and Molecular Medicine</option>
												<option>Philosophy</option>
												<option>Physical Medicine and Rehabilitation</option>
												<option>Physical Therapy</option>
												<option>Physical Health and Education</option>
												<option>Physics</option>
												<option>Political Studies</option>
												<option>Psychiatry</option>
												<option>Psycology</option>
												<option>Public Administration</option>
												<option>Public Health</option>
												<option>Religious Studies</option>
												<option>Statistics</option>
												<option>Urban and Regional Planning</option>
												<option>World Language Studies</option>
											</select>
										</div>
										<div style='padding-right: 15px; padding-left: 15px;' class="col-md-3">
											<select style="width: 100%;" type="text" class="form-control" name="Year" id="Year">
												<option value="" selected disabled>Year</option>
												<option>2021</option>
												<option>2020</option>
												<option>2019</option>
												<option>2018</option>
												<option>2017</option>
												<option>2016</option>
												<option>2015</option>
												<option>2014</option>
												<option>2013</option>
												<option>2012</option>
												<option>2011</option>
												<option>2010</option>
											</select>
										</div>
								</div>
							</div>
						 	<div class="form-group">
								<input style="width: 100%;" type="password" class="form-control" name="Password" id="Password" placeholder="Create Password">
						 	</div>
						 	<div style="text-align: center">
								<button type="submit" name='sign_up' class="btn btn-default">Sign Up</button>
							</div>
						</form>
						<?php
						if (isset($_GET["msg"]) && $_GET["msg"] == 'bademail') {
						echo "<br><div align='center'><span class='label label-danger'>Email already in use :(</span></div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<hr>
			<p class="centered">Created by Ben, Sean, Vinyas &amp; Vinith for QHacks 2017.</p>
		</div>
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
</html>

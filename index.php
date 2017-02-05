∏<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="VMS&amp;SN&amp;BB&amp;VH">

    <link rel="shortcut icon" href="img/favicon.png">

    <title>QThrive - Better mental health through journaling </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  <style>
  #headerwrap{
    background-image: url("img/time2.jpg");
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    }
  </style>

  </head>

  <body>

  	<?php
	  //Create a user session or resume an existing one
	 session_start();
	?>

	<?php
	 //check if the user is already logged in and has an active session
	if(isset($_SESSION['Member_ID'])) {
		//Redirect the browser to the profile editing page and kill this page.
		header("Location: userdash.php");
		die();
	}
	?>

    <!-- Fixed navbar -->
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

            		<li><a href="login.php"><h4 style="color:white">Already a member?</h4></a></li>

         		</ul>

        	</div>
        	<!--/.nav-collapse -->

	    </div>

    </div>

	<div id="headerwrap">

		<div class="container">

			<div class="row">

				<div class="col-lg-6 col-lg-offset-6">

					<h1>Work towards better mental health... one journal entry at a time.</h1>

					<form action="signup.php" method="GET" class="form-inline" role="form">

						<div class="form-group" style="margin-left:15%">

					 		<input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="youremail@address.ca">

						</div>

						<button type="submit" class="btn btn-warning btn-lg" value="Submit">Sign Me Up!</button>

					</form>

				</div>
				<!-- /col-lg-6 -->

				<div class="col-lg-6">

				</div>
				<!-- /col-lg-6 -->

			</div>
			<!-- /row -->

		</div>
		<!-- /container -->

	</div>
	<!-- /headerwrap -->

	<div class="container">

		<div class="row mt centered">

			<div class="col-lg-6 col-lg-offset-3">

				<h1>Pain is real, but so is hope.</h1>

			</div>

		</div>
		<!-- /row -->

		<div class="row mt centered">

			<div class="col-lg-4">

				<a href="chat.php"><img src="img/index01.png" height="180" alt=""></a>

				<h4>Chat.</h4>

				<p>Need someone to talk to?<br>Meet Sona.<br>Sona is a chatbot that helps facilitate journaling.</p>

			</div>
			<!--/col-lg-4 -->

			<div class="col-lg-4">

				<a href="journal.php"><img src="img/index02.png" height="180" alt=""></a>

				<h4>Journal.</h4>

				<p>Stressed? Upset? Need to vent?<br>Take a minute to record your thoughts.<br>We're here for you, always.</p>

			</div>
			<!--/col-lg-4 -->

			<div class="col-lg-4">

				<a href="jentries.php"><img src="img/index03.png" height="180" alt=""></a>

				<h4>Thrive.</h4>

				<p>Access local resources.<br>Look at personal growth.<br>Be well.</p>

			</div>
			<!--/col-lg-4 -->

		</div>
		<!-- /row -->

	</div>
	<!-- /container -->

	<div class="container">

		<hr>

		<div class="row centered">

            <div class="row centered">

                <div class="col-lg-6 col-lg-offset-3">

                    <h1>QThrive is for students.</h1>

                    <h3>Take the challenges and joys of life one day at a time.</h3>

                </div>

            </div>

			<div class="col-lg-6 col-lg-offset-3">

				<form action="signup.php" method="GET" class="form-inline" style="margin-top:1em" role="form">

					<div class="form-group">

				 		<input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="youremail@address.ca">

					</div>

					<button type="submit" class="btn btn-warning btn-lg" value="Submit">Sign Me Up!</button>

				</form>

			</div>

		</div>
		<!-- /row -->

		<hr>

	</div>
	<!-- /container -->

	<div class="container">

		<p class="centered">Created by Ben, Sean, Vinyas &amp; Vinith for QHacks 2017.</p>

	</div>
	<!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

  </body>

</html>

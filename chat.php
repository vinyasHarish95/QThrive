∏<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="VMS&amp;SN&amp;BB&amp;VH">

    <link rel="shortcut icon" href="img/favicon.png">

    <title>QThrive - Better mental health through journalling </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

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

            		<li><a><h4 style="color: white;">Welcome, Vinyas.</h4></a></li>

         		</ul>

        	</div>
        	<!--/.nav-collapse -->

	    </div>

    </div>

	<div id="headerwrap">

		<div class="container">

			<div class="row">

				<div class="col-lg-6">
          <img class="img-responsive" style=" height: auto; width: auto; max-height: 600px; max-width: 600px;" src="img/sona.png" alt="Sona">
					<h1>Meet Sona...</h1>
					<h2>Sona is a friendly chatbot that will help facilitate reflection.</h2>


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

				<h1>So what do I do?</h1>
				<h4>Speak to Sona like you would a normal person. Based on what you tell her, she may prompt you to do some journalling or connect you to local resources.</h4>
				<p></p>
				<h4>Fun fact... 'Sona' is Scottish Gaelic for 'happy'.</h4>

			</div>

		</div>

			<!--/col-lg-4 -->

			<div class="row mt centered">

				<div class="col-lg-6 col-lg-offset-3">



				</div>

			</div>
			<!-- /row -->

		</div>
		<!-- /row -->

	</div>
	<!-- /container -->

	<div class="container">

		<hr>

		<div class="row centered">

		</div>
		<!-- /row -->
		<h1 class="centered">QThrive is for students.</h1>
		<h3 class="centered">Take the challenges and joys one day at a time.</h3>

		<hr>

	</div>
	<!-- /container -->

	<div class="container">

		<p class="centered">Created by Ben, Sean, Vinyas &amp; Vinith</p>

	</div>
	<!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

  </body>

</html>

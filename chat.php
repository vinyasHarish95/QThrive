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

    <script>
    var accessToken = "d458d5cf2a7841bfba46146f8206d539";
		var baseUrl = "https://api.api.ai/v1/";
		$(document).ready(function() {
			$("#input").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					send();
				}
			});
			$("#rec").click(function(event) {
				switchRecognition();
			});
		});
		var recognition;
		function startRecognition() {
			recognition = new webkitSpeechRecognition();
			recognition.onstart = function(event) {
				updateRec();
			};
			recognition.onresult = function(event) {
				var text = "";
			    for (var i = event.resultIndex; i < event.results.length; ++i) {
			    	text += event.results[i][0].transcript;
			    }
			    setInput(text);
				stopRecognition();
			};
			recognition.onend = function() {
				stopRecognition();
			};
			recognition.lang = "en-US";
			recognition.start();
		}

		function stopRecognition() {
			if (recognition) {
				recognition.stop();
				recognition = null;
			}
			updateRec();
		}
		function switchRecognition() {
			if (recognition) {
				stopRecognition();
			} else {
				startRecognition();
			}
		}
		function setInput(text) {
			$("#input").val(text);
			send();
		}
		function updateRec() {
			$("#rec").text(recognition ? "Stop" : "Speak");
		}
		function send() {
			var text = $("#input").val();
			$.ajax({
				type: "POST",
				url: baseUrl + "query?v=20150910",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				headers: {
					"Authorization": "Bearer " + accessToken
				},
				data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
				success: function(data) {
					setResponse(JSON.stringify(data, undefined, 2));
				},
				error: function() {
					setResponse("Internal Server Error");
				}
			});
			setResponse("Loading...");
		}
		function setResponse(val) {
			$("#response").text(val);
		}
	</script>

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

            		<li><a><h4>Welcome, Vinyas.</h4></a></li>

         		</ul>

        	</div>
        	<!--/.nav-collapse -->

	    </div>

    </div>

	<div id="headerwrap">

		<div class="container">

			<div class="row">

				<div class="col-lg-6">
                    <img class="img-responsive center-block" style=" height: 220px; width: 220px; max-height: 600px; max-width: 600px ;" src="img/sona.png" alt="Sona">
                    <p></p>
					<h1>Meet Sona...</h1>
					<h2>Sona is a friendly chatbot that will help facilitate reflection.</h2>


				</div>
				<!-- /col-lg-6 -->

				<div class="col-lg-6">

                    <iframe
                        width="600"
                        height="430"
                        src="https://console.api.ai/api-client/demo/embedded/569cbb55-a64c-4671-8c95-6494d83be7a8">
                    </iframe>

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
                <h6>DISCLAIMER: Note that Sona cannot provide medical diagnoses or replace attending counselling or therapy with a health professional. </h6>
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
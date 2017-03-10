<?php
session_start();
include_once 'config/connection.php';
if (isset($_POST['submit'])) {
	$now = date("Y-m-d H:i:s");
	$entry = $_POST['journalEntry'];
	$joy = $_COOKIE["joy"];
	$anger = $_COOKIE["anger"];
	$sadness = $_COOKIE["sadness"];
	$surprise = $_COOKIE["surprise"];
	$fear = $_COOKIE["fear"];
	$queryAddEntry = "INSERT INTO Entry (Writer_ID, Creation_Date, Entry_Body, Joy, Anger, Sadness, Surprise, Fear)
																VALUES ('1','$now','$entry','$joy','$anger','$sadness','$surprise','$fear' )";
	$queryAddEntry = mysqli_query($con,$queryAddEntry);
}?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="author" content="VMS&amp;SN&amp;BB&amp;VH">

  <link rel="shortcut icon" href="img/favicon.png">

  <title>QThrive - Journal </title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">

	<link href="css/circle.css" rel="stylesheet">

  <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		body {
			background-image: url("img/lake.jpg");
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			}
		#headerwrap {
			background-color: transparent;
			padding-top: 100px;
			}
		.navbar-default {
			background-color: transparent;
		}
		#bottompanel {
			background-color: rgba(113, 113, 113, 0.8);
			top: 1000px;
		}
		#bottomBlurb {
			padding-top: 20px;
			padding-bottom: 20px;
			color: white;
		}

		#journal {
			color: white;
			background-color: rgba(100,100,100, 0.5);
			width: 100%;
			height: 250px;
			padding: 12px 20px;
			border: 2px solid #ffffff;
			border-radius: 2px;
		}
		#bottomCredits {
			color: white;
		}
			/* The Modal (background) */
		#modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		#modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
		}

		* The Close Button */
		#close {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		#close:hover,
		#close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
</style>

</head>
<body>
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
              <li><a><h4 style="color:white;">Welcome, Sean.</h4></a></li>
          </ul>
        </div>
    </div>
  </div>

  <div id="headerwrap">
  <div class="container">
    <form name="journal" id="journalForm" action='journal.php' method='POST'>
        <div class="form-group">
            <h1 for="journal" style="text-align:center">Journal Entry</h1>
            <textarea name="journalEntry" id="journal"></textarea>
        </div>
				<div class="btn-group" style="margin-left:20%"> <button id="sentiment" data-toggle="modal" data-target="#myModal" type="analyze" class="btn" name="analyze" style="background: #3498db; border: 2px solid white;
				color: white; width: 300px; height: 100 px;  font-size:20px; margin-right:100px">Analyze</button>
        <button type="submit" class="btn" name="submit" style="background: #3498db; border: 2px solid white;
				color: white; width: 300px; height: 44px;  font-size:20px">Submit</button></div>
				<div class="container">

				 <!-- Modal -->
				 <div class="modal fade" id="myModal" role="dialog">
				   <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				        <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Sentiments Analysis (Joy, Fear, Anger, Surprise, Sadness)</h4>
				    </div>
				    <div class="modal-body" style="margin-left:30px">
                        <div class="row" style="margin-left:30px">
                        <div class="clearfix">

		                <div id="cJoy" class="c100" style="margin-right:20px">
		                    <span id="lblJoy"></span>
		                    <div class="slice">
		                        <div class="bar"></div>
		                        <div class="fill"></div>
		                    </div>
		                </div>

						<div id="cFear" class="c100 p16 green" style="margin-right:20px">
		                    <span id="lblFear">16%</span>
		                    <div class="slice">
		                        <div class="bar"></div>
		                        <div class="fill"></div>
		                    </div>
		                </div>

						<div id="cAnger" class="c100 p1 orange" style="margin-right:20px">
		                    <span id="lblAnger">0.49%</span>
		                     <div class="slice">
		                         <div class="bar"></div>
		                         <div class="fill"></div>
		                     </div>
		                 </div>

						</div>
						</div>
						<div class="row" style="margin-left:60px">

						<div id="cSurprise" class="c100 p2" style="margin-left:40px; margin-right:20px">
		                    <span id="lblSurprise">1.65%</span>
		                    <div class="slice">
		                        <div class="bar"></div>
		                        <div class="fill"></div>
		                    </div>
						</div>

						<div id="cSadness" class="c100 p1 green" style="margin-right:20px">
                            <span id="lblSadness">1.15%</span>
                            <div class="slice">
				                <div class="bar"></div>
				                <div class="fill"></div>
				            </div>
				        </div>

                        </div>



		             </div>
				       </div>
				       <div class="modal-footer">
				         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				       </div>
				     </div>

				   </div>
				 </div>

				</div>
    </form>
  </div>
</div>

<script>

        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length == 2) return parts.pop().split(";").shift();
        }

		//Indico API call
		$('#sentiment').click(function(event){
				event.preventDefault();
				var form= $('form').serializeArray();
				var text = $('#journalForm').find("textarea[name='journalEntry']").val();
				$.post(
						'https://apiv2.indico.io/emotion',
						JSON.stringify({
						'api_key': "acf9fb74754d35516890238867cc2c73",
						'data': text
						})
				).then(function(res) {
						emotionValues = JSON.parse(res)
						console.log(emotionValues.results)
						var now = new Date();
						now.setTime(now.getTime() + 1 * 3600 * 1000);
						document.cookie = 'joy='+emotionValues.results.joy+'; expires=' + now.toUTCString() + '; path=/';
						document.cookie = 'anger='+emotionValues.results.anger+'; expires=' + now.toUTCString() + '; path=/';
						document.cookie = 'sadness='+emotionValues.results.sadness+'; expires=' + now.toUTCString() + '; path=/';
						document.cookie = 'fear='+emotionValues.results.fear+'; expires=' + now.toUTCString() + '; path=/';
						document.cookie = 'surprise='+emotionValues.results.surprise+'; expires=' + now.toUTCString() + '; path=/';

                        // populate modal
                        document.getElementById("lblJoy").textContent = Math.round(emotionValues.results.joy*100) + "%";
                        $('#cJoy').removeClass('c100').addClass('c100 p' + Math.round(emotionValues.results.joy*100));

                        document.getElementById("lblFear").textContent = Math.round(emotionValues.results.fear*100) + "%";
                        $('#cFear').removeClass('c100').addClass('c100 p' + Math.round(emotionValues.results.fear*100));

                        document.getElementById("lblAnger").textContent = Math.round(emotionValues.results.anger*100) + "%";
                        $('#cAnger').removeClass('c100').addClass('c100 p' + Math.round(emotionValues.results.anger*100));

                        document.getElementById("lblSurprise").textContent = Math.round(emotionValues.results.surprise*100) + "%";
                        $('#cSurprise').removeClass('c100').addClass('c100 p' + Math.round(emotionValues.results.surprise*100));

                        document.getElementById("lblSadness").textContent = Math.round(emotionValues.results.sadness*100) + "%";
                        $('#cSadness').removeClass('c100').addClass('c100 p' + Math.round(emotionValues.results.sadness*100));
				});
		})
</script>
</body>
</html>

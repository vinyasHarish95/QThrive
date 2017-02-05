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

  <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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
		#submitButton {
			color: white;
			background: rgba(100,100,100, 0.5);
			margin-left: 45%;
			margin-top: 10px;
			font-size: 125%;
			border: 2px solid #ffffff;
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
              <li><a><h4 style="color:white;">Welcome, Vinyas.</h4></a></li>
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
				<button id="sentiment" type="analyze" class="btn btn-default" name="analyze">Analyze</button>
        <button type="submit" class="btn btn-default" name='submit'>Submit</button>
    </form>
  </div>
</div>

<script>
		// single example
		$('#sentiment').click(function(event){
				event.preventDefault();
				var form= $('form').serializeArray();
				var text = $('#journalForm').find("input[name='journalEntry']").val();
				$.post(
						'https://apiv2.indico.io/emotion',
						JSON.stringify({
						'api_key': "4a08c5fe6af3a28e60008e586a51d45d",
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
				});
		})
</script>
</body>
</html>

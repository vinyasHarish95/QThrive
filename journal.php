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
              <li><a>Welcome, Vinyas.</a></li>
          </ul>
        </div>
    </div>
  </div>

  <div id="headerwrap">
  <div class="container">
    <form id="journalForm">
        <div class="form-group">
            <h2 for="journal">Journal Entry:</h2>
            <input type="text" name="journalEntry" class="form-control" id="journal">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</div>

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

  <p class="centered">Created by Ben, Sean, Vinyas, &amp; Vinith</p>

</div>
<script>
    // single example
    $("#journalForm").submit(function(event){
        event.preventDefault();
        var form= $('form').serializeArray();
        var text = $('#journalForm').find("input[name='journalEntry']").val();
        $.post(
            'https://apiv2.indico.io/emotion',
            JSON.stringify({
            'api_key': "4a08c5fe6af3a28e60008e586a51d45d",
            'data': text
            })
        ).then(function(res) { console.log(res) });

    })
</script>
</body>
</html>

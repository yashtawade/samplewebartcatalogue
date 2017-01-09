<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=art", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    //echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
  <head>
    <title>Default.php</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

<!-- Custom styles for this template -->
<link href="carousel.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">

<!-- <link rel="stylesheet" type="text/css" href="custom.css">  -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Basic CSS  -->
<style>
 #blah{
  color: white;
 }

#pad, #pad1{ 
  padding-left: 60px;
  }
</style>
</head>
<body>
<div class="navbar-wrapper">

      
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">WDM Project 3</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="Default.php">Home</a></li>
                <li><a href="About.php">About Us</a></li>
                
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages<span class="caret"></span></a>
                
                  <ul class="dropdown-menu">
                    <li><a href="Part01_ArtistsDataList.php">Artist's Data List (Part 1)</a></li>
                    <li><a href="Part02_SingleArtist.php">Single Artist (Part 2)</a></li>
                    <li><a href="Part03_SingleWork.php">Single Work (Part 3)</a></li>
                    <li><a href="Part04_Search.php">Search (Part 4)</a></li>
                  </ul>
                </li>
                <!-- <li id = "blah" class="pull-right">Yash Tawade</li> -->
              </ul>
              <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
          <span style="color:white; padding-right: 20px">Yash Tawade</span>
            <div class="form-group">
              <input type="text" placeholder="Search Paintings" class="form-control" id="barSearchData">
            </div>
            <button type="button" class="btn btn-info" onclick="navbarSearch()">Search</button>
          </form>
        </div>
      </div>
    </nav>
            </div>
          </div>
        </nav>

     
</div>
<div class="jumbotron">
        <h1 id = "pad">Welcome to Assignment #3</h1>
        <p id = "pad1">This is the 3rd assignment for Yash Tawade for the course CSE 5335</p>
</div>

<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
          <h3><span class = "glyphicon glyphicon-info-sign"></span> About Us</h3>
          <p>What this is all about and other stuff</p>
          <p><a class="btn btn-default" href="About.php" role="button"> Visit Page <span class="glyphicon glyphicon-link"></span></a></p>
        </div>
        <div class="col-md-2">
          <h3><span class = "glyphicon glyphicon-list"></span> Artist List</h3>    
          <p>Display a list of artist names as links </p>
          <p><a class="btn btn-default" href="Part01_ArtistsDataList.php" role="button">Visit Page <span class="glyphicon glyphicon-link"></span></a></p>
       </div>
        <div class="col-md-2">
          <h3><span class = "glyphicon glyphicon-user"></span> Single Artist</h3>
          <p>Displays information of a single artist</p>
          <p><a class="btn btn-default" href="Part02_SingleArtist.php" role="button">Visit Page <span class="glyphicon glyphicon-link"></span></a></p>
        </div>
        <div class="col-md-2">
          <h3><span class = "glyphicon glyphicon-picture"></span> Single Work</h3>
          <p>Displays information for a single work </p>
          <p><a class="btn btn-default" href="Part03_SingleWork.php" role="button">Visit Page <span class="glyphicon glyphicon-link"></span></a></p>
        </div>
        <div class="col-md-2">
          <h3><span class="glyphicon glyphicon-search"></span> Search</h3>
          <p>Performs search on ArtWork tables </p>
          <p><a class="btn btn-default" href="Part04_Search.php" role="button">Visit Page <span class="glyphicon glyphicon-link"></span></a></p>
       </div>
  
        </div>
      </div>

<script type="text/javascript">
function navbarSearch(){
            var searchPageBaseURL = '/project3/Part04_Search.php';
            var searchCriteria = '';
            if ($("#barSearchData").val() != "") {
                searchCriteria = "?title=" + $("#barSearchData").val();
            }
            window.location = "http://" + window.location.hostname + ':' + window.location.port + searchPageBaseURL + searchCriteria;
        }
    </script>

</body>

</html>
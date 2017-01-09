<!DOCTYPE html>
  <head>
    <title>About.php</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>


    <!-- jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom styles for this template -->
 <link href="carousel.css" rel="stylesheet">
 <link href="jumbotron.css" rel="stylesheet">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

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
                <!-- <li class="dropdown"> -->
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="Part01_ArtistsDataList.php">Artist's Data List (Part 1)</a></li>
                    <li><a href="Part02_SingleArtist.php">Single Artist (Part 2)</a></li>
                    <li><a href="Part03_SingleWork.php">Single Work (Part 3)</a></li>
                    <li><a href="Part04_Search.php">Search (Part 4)</a></li>
                  </ul>
                </li>
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
<div class="jumbotron" style="padding-left: 50px">
        <h1 class = "abt">About Us</h1>
        <p>This site is an assignment for CSE 5335 done by Yash Tawade </p>
        
        <?php
        echo "<p>The date is " . date("l jS \of F Y") . "</p>";
        ?>
</div>
</p>
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
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Basic CSS  -->
<style>

.jumbotron {
background-color:white !important;
} 

.pad1, .pad{
  padding-left: 60px;
}

#myA{
  padding-left: 60px;
}

</style>
</head>
<body>
<div class="navbar-wrapper">
      

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
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
              </ul>
              <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                      <span style="color:white; padding-right: 20px">Yash Tawade</span>
            <div class="form-group">
              <input type="text" placeholder="Search Paintings" class="form-control" id="barSearchData">
            </div>
            <button type="button" class="btn btn-info" onclick="barSearch()">Search</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
            </div>
          </div>
        </nav>
            <div class = "container">
            <div class = "jumbotron">
            <h1>Artists Data List (Part 1)</h1><hr/>
            <?php
            $username="root";$password="";$database="art";
            mysql_connect("localhost",$username,$password);
            @mysql_select_db($database) or die( "Unable to select database");
            $query="SELECT * FROM artists"; // Need to write the ORDER_BY criteria
            $result=mysql_query($query);
            $num=mysql_numrows($result);
            if ($num > 0) {
                // output data of each row
                while ($row = mysql_fetch_assoc($result))
                {
                    echo "<a href=\"Part02_SingleArtist.php?id={$row['ArtistID']}\">{$row['FirstName']} {$row['LastName']} ({$row['YearOfBirth']}-{$row['YearOfDeath']})</a></br>";
                }
            } else {
                echo "0 results";
            }
            mysql_close();
            ?>
            </div>
            </div>


<script type="text/javascript">
function barSearch(){
            var searchPageBaseURL = '/project3/Part04_Search.php';
            var searchCriteria = '';
            if ($("#barSearchData").val() != "") {
                searchCriteria = "?title=" + $("#barSearchData").val();
            }
            window.location = "http://" + window.location.hostname + ':' + window.location.port + searchPageBaseURL + searchCriteria;
        }
    </script>
    <!-- jQuery -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
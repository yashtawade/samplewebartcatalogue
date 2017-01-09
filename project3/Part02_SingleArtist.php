<!DOCTYPE html>
  <head>
    <title>SingleArtist.php</title>
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
body{
  background-color: white;
}
  #btn
  {
    color:#157DEC;
  }

  .btn-custom {
    color: #00C7FF;
    background-color: #FFFFFF;
}
}
</style>
</head>
<body>
<div class="navbar-wrapper">

      
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button> -->
              <a class="navbar-brand" href="#">WDM Project 4</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="Default.php">Home</a></li>
                <li><a href="About.php">About Us</a></li>
                <!-- <li class="dropdown"> -->
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages<span class="caret"></span></a>
                  <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<span class="caret"></span></a> -->
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


        <div>
            <div>
                <?php
                $username="root";$password="";$database="art";
                mysql_connect("localhost",$username,$password);
                @mysql_select_db($database) or die( "Unable to select database");
                $query="SELECT * FROM artists where ArtistID = ".$_GET['id'];
                $result=mysql_query($query);
                $num=mysql_numrows($result);
                $file_path = 'images/art/artists/medium/';
                if ($num > 0) {
                    // output data of each row
                    while ($row = mysql_fetch_assoc($result))
                    {
                        $src=$file_path.$row['ArtistID'];
                        echo "<div class='col-md-12'>";
                        // echo "<button type='button' class='pull-right btn btn-default btn-lg'> <span class='glyphicon glyphicon-heart' aria-hidden='true'></span> Add to favourites list</button>";
                        echo "<h2>{$row['FirstName']} {$row['LastName']}</h2><hr/>";
                        //The Image on the left side
                        echo "<div class='col-md-6'>";
                        echo "<img src='{$src}.jpg' />";
                        echo "</div>";
                        //The information on the right side
                        echo "<div class='col-md-6'>";
                        echo "<p>{$row['Details']}</p>";
                       

                        echo "<button type='button' id = 'btn' class='pull-left btn btn-default btn-lg'> <span class='glyphicon glyphicon-heart'></span> Add to favourites list</button><br/><br/>";
                        echo "<br><div class='panel panel-default'> <div class='panel-heading'> <h3 class='panel-title'>Artist Details</h3> </div> 
                            <div class='panel-body'> <table class='table table-striped'> <tr><td>Date:</td><td>{$row['YearOfBirth']}-{$row['YearOfDeath']} </td></tr><tr><td>Nationality:</td><td>{$row['Nationality']}</td></tr><tr><td>More Info</td><td><a href='{$row['ArtistLink']}'>{$row['ArtistLink']}</a></td></tr></table> </div> </div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col-md-12'>";
                        echo "<h2>Art by {$row['FirstName']} {$row['LastName']}</h2><hr/>";
                    }
                } else {
                    //If the artist is not found
                    echo "<h1>Artist Not Found</h1><br/><a class='btn btn-default' href='Part01_ArtistsDataList.php'>Go back</a>";
                }

                mysql_close();
                ?>
                <?php
                $username="root";$password="";$database="art";
                mysql_connect("localhost",$username,$password);
                @mysql_select_db($database) or die( "Unable to select database");
                $query="SELECT * FROM artworks where ArtistID =".$_GET['id'];
                $result=mysql_query($query);
                $num=mysql_numrows($result);
                if ($num > 0) {
                    // output data of each row
                    $file_path = 'images/art/works/square-medium/';
                    while ($row = mysql_fetch_assoc($result))
                    {
                        $src=$file_path.$row['ImageFileName'];
                        echo '<div class="col-md-4">';
                        echo "<div class='thumbnail'> <img src='{$src}.jpg' alt='...'> <div class='caption'> <h4>{$row['Title']}</h4> <p>({$row['YearOfWork']})</p> <a href='/project3/Part03_SingleWork.php?id={$row['ArtWorkID']}' type='button' class='btn btn-primary'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> View</a> <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-gift' aria-hidden='true'></span> Wish</button> <button type='button' class='btn btn-info'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Cart</button> </div> </div>";
                        echo "</div>";
                    }
                } else {
                    //If the artist is not found
                    echo "<h1>Artist Not Found</h1><br/><a class='btn btn-default' href='Part01_ArtistsDataList.php'>Go back</a>";
                }
                echo "</div>";
                mysql_close();
                ?>
            </div>
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
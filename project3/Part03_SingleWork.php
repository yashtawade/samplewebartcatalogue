<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=art", $username, $password);
    //mysql_set_charset($conn, 'utf-8');
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
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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

    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />

<style>
#btn1 , #btn2
{
    color:#157DEC;
}

.red{
  color: red;
  font-size: 175%;
}

#blah {
  color: #333;
  background-color: #f5f5f5;
  border-color: #ddd;
}
</style>

    <!-- Custom CSS -->
    <!-- <link href="custom.css" rel="stylesheet" /> -->
</head>

<body><div class="navbar-wrapper">
      

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
            <button type="button" class="btn btn-info" onclick="navbarSearch()">Search</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
            </div>
          </div>
        </nav>
    <div class="container">
      
        <?php
        if(!isset($_GET['id']))
        { 
            echo "<div class='my-block'> <h1>ERROR</h1> <a class='btn btn-default' href='/project3/Default.php'>Go Home</a> </div>";

        }
        else
        {
            $username="root";$password="";$database="art";
        mysql_connect("localhost",$username,$password);
        @mysql_select_db($database) or die( "Unable to select database");
        $query="SELECT * FROM artworks where ArtworkID = ".$_GET['id'];
        $result=mysql_query($query);
        $num=mysql_numrows($result);
        if ($num > 0) {
            // output data of each row
            $file_path = 'images/art/works/medium/';
            while ($row = mysql_fetch_assoc($result))
            {
                $src=$file_path.$row['ImageFileName'];

                echo "<div class='col-md-12'>";
                echo "<h2>{$row['Title']}</h2>";
                $query1="SELECT * FROM artists where ArtistID = ".$row['ArtistID'];
                $result1=mysql_query($query1);
                $num1=mysql_numrows($result1);
                if ($num1 > 0) {
                    while ($row1= mysql_fetch_assoc($result1))
                    {
                        echo "<div>By <a href='Part02_SingleArtist.php?id={$row['ArtistID']}'>{$row1['FirstName']}</a> </div><hr/>";
                    }
                }
                echo "</div>";
                echo "<div class='col-md-6'>";
                echo "<img class='img-responsive' src='{$src}.jpg' alt='...'  data-toggle='modal' data-target='#myModal'>";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<p>{$row['Description']}</p><br/>";
                //echo number_format('1000000',2).'</br>';
                $num = $row['MSRP'];
                $formattedNum = number_format($num,2);
                echo "<p class = 'red'>$ {$formattedNum} </p>";
               // echo "<p class = 'red'>$ {$row['MSRP']} </p>";
                echo "<div class='btn-group'><button type='button' id = 'btn1' class='btn btn-default'><span class='glyphicon glyphicon-gift'></span> Add to wish list</button><button type='button' id = 'btn2' class='btn btn-default'><span class='glyphicon glyphicon-shopping-cart'></span> Add to shopping cart</button></div>";
                echo "<br/>";
                echo "<br><div class='panel panel-default'> <div class='panel-heading'> <h3 class='panel-title'>Product Details</h3> </div>
                            <div class='panel-body'> <table class='table table-striped'> <tr><td><b>Date:</b></td><td>{$row['YearOfWork']}</td></tr><tr><td><b>Medium:</b></td><td>{$row['Medium']}</td></tr><tr><td><b>Dimensions:</b></td><td>{$row['Width']}cm x {$row['Height']}cm</td></tr><tr><td><b>Home:</b></td><td>{$row['OriginalHome']}</td></tr>
                            <td><b>Genres:</b></td><td>";
                            $query2="SELECT DISTINCT  g.GenreName FROM artworks art, artworkgenres ag, genres g where art.ArtistID = ".$row['ArtistID']." and art.ArtWorkID = ag.ArtWorkGenreID and ag.GenreID = g.GenreID";
                            $result2=mysql_query($query2);
                            $num2=mysql_numrows($result2);
                            if ($num2 > 0) {
                                while ($row2= mysql_fetch_assoc($result2))
                                {
                                 echo "<a>{$row2['GenreName']}</a><br/>";
                                }
                            }
                            echo "</td></tr>
                            <td><b>Subjects:</b></td><td>";
                            $query2="Select DISTINCT  s.SubjectName from artworks art, artworksubjects aSub, subjects s WHERE art.ArtWorkID = aSub.ArtWorkID and art.ArtistID = ".$row['ArtistID']." and aSub.SubjectID = s.SubjectId ";
                            $result2=mysql_query($query2);
                            $num2=mysql_numrows($result2);
                            if ($num2 > 0) {
                                while ($row2= mysql_fetch_assoc($result2))
                                {
                                    echo "<a>{$row2['SubjectName']}</a><br/>";
                                }
                            }
                            echo"</td></tr></table> </div> </div>";

                echo "</div>";
                echo "<div class='col-md-2'>";
                echo '<div id = "blah" class="panel panel-default"> <div class="panel-heading">Sales</div> <div class="panel-body">';
                $query3="select o.DateCompleted from orderdetails od, orders o, artworks a where o.OrderID = od.OrderID and a.ArtWorkID = od.ArtWorkID and a.ArtistID = ".$row['ArtistID'];
                $result3=mysql_query($query3);
                $num3=mysql_numrows($result3);
                if ($num3 > 0) {
                    while ($row3= mysql_fetch_assoc($result3))
                    {
                       $date = $row3['DateCompleted'];
                       $createDate = new DateTime($date);
                       //Formats the dates accordingly
                       $strip = $createDate->format('m/d/y');
                        echo "<a>{$strip}</a><br/>";
                    }
                }
                echo '</div> </div>';
                echo "</div";
            }
        }
        else {
            echo "0 results";
        }
        mysql_close();
    }
        ?>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <?php
            $username="root";$password="";$database="art";
            mysql_connect("localhost",$username,$password);
            @mysql_select_db($database) or die( "Unable to select database");
            $query4="SELECT  * FROM artworks where ArtworkID = ".$_GET['id'];
            $result4=mysql_query($query4);
            $num4=mysql_numrows($result4);
            if ($num4 > 0) {
                // output data of each row
                $file_path4 = 'images/art/works/medium/';
                while ($row4 = mysql_fetch_assoc($result4))
                {
                    $src4=$file_path4.$row4['ImageFileName'];
                    echo "<div class='modal-content'> <div class='modal-header'> <button type='button' class='close' data-dismiss='modal'>&times;</button> <h4 class='modal-title'>{$row4["Title"]}</h4> </div> <div class='modal-body'> <img class='img-responsive' src='{$src4}.jpg'>  </p> </div> <div class='modal-footer'> <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> </div> </div>";
                }
            }
            else {
                echo "0 results";
            }
            mysql_close();
            ?>
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
    <!-- jQuery -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
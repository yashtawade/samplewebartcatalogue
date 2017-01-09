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
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Part04_Search.php</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Font Awesome -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <!-- <link href="custom.css" rel="stylesheet" /> -->
</head>

<body>
<!-- Navbar! -->
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
            <button type="button" class="btn btn-info" onclick="navbarSearch()">Search</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
            </div>
          </div>
        </nav>
    <div class="container">
        
        <h2>Search results</h2>
        <hr />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="radio">
                    <label>
                        <input type="radio" id="chkFilterByTitle" />Filter By Title
                    </label>
                    <div id="title" class="form-group" style="display: none">
                        <input type="text" class="form-control" id="titleSearch" />
                    </div>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="chkFilterByDescription" />Filter By Description
                    </label>
                    <div id="description" class="form-group" style="display: none">
                        <input type="text" class="form-control" id="descriptionSearch" />
                    </div>
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="optradio" id="none" />No filter (show all art works)
                    </label>
                </div>
                <button type="button" class="btn btn-primary" onclick="filter()">Filter</button>
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $username="root";$password="";$database="art";
                mysql_connect("localhost",$username,$password);
                @mysql_select_db($database) or die( "Unable to select database");
                $query = 'SELECT * FROM artworks';
                if (isset($_GET['title'])) {
                    $query="SELECT * FROM artworks where Title LIKE  '%".$_GET['title']."%'";
                }
                if (isset($_GET['description'])) {
                    $query="SELECT * FROM artworks where Description LIKE  '%".$_GET['description']."%'";
                }

                $result=mysql_query($query);
                $file_path = 'images/art/works/square-medium/';
                $num=mysql_numrows($result);
                if($num > 0)
                {
                    while ($row = mysql_fetch_assoc($result))
                    {
                        $src=$file_path.$row['ImageFileName'].'.jpg';
                        echo "<div class='row' style='padding-top:15px'>";

                        echo "<div class='col-md-2'>";
                        echo "<img class='img-responsive' src='{$src}'>";
                        echo "</div>";
                        $path = "/project3/Part03_SingleWork.php?id=".$row['ArtWorkID'];
                        echo "<div class='col-md-10'>";
                        echo "<a href='{$path}'><h4>{$row['Title']}</h4></a>";
                        if($row['Description'] == '')
                        {
                            echo "---No description---";
                        }
                        else
                        {
                            $str = $row['Description'];
                            $keyword ='';
                            if(isset($_GET['description']))
                            {
                                $keyword = $_GET['description'];
                            }
                            
                            if( $keyword!='')
                            {
                                $str = preg_replace("/\b([a-z]*${keyword}[a-z]*)\b/i","<mark><b>$1</b></mark>",$str);
                            }
                            
                            echo $str;
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }
                else{
                    echo "No results";
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var isTitle = false;
            var isDescription = false;
            $("#chkFilterByTitle").click(function () {
                $("#title").show();
                $("#description").hide();
                $(chkFilterByDescription).prop('checked', false);
                $(chkFilterByTitle).prop('checked', false);
                document.getElementById('descriptionSearch').value = "";
            });

            $("#chkFilterByDescription").click(function () {
                $("#description").show();
                $("#title").hide();
                $(chkFilterByTitle).prop('checked', false);
                $(none).prop('checked', false);
                document.getElementById('titleSearch').value = "";
            });

            $("#none").click(function () {
                $("#description").hide();
                $("#title").hide();
                $(chkFilterByTitle).prop('checked', false);
                $(chkFilterByDescription).prop('checked', false);
                isTitle = false;
                isDescription = false;
                document.getElementById('descriptionSearch').value = "";
                document.getElementById('titleSearch').value = "";
            });
        });

        function filter() {
            var searchPageBaseURL = '/project3/Part04_Search.php';
            var searchCriteria = '';
            if ($("#titleSearch").val() != "") {
                searchCriteria = "?title=" + $("#titleSearch").val();
            }
            else if ($("#descriptionSearch").val() != "") {
                searchCriteria = "?description=" + $("#descriptionSearch").val();
            }
            window.location = "http://" + window.location.hostname + ':' + window.location.port + searchPageBaseURL + searchCriteria;
        }

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
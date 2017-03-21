<?php
include('session.php');

?>
<!DOCTYPE html>
<script>
function successfulAdd(){
	var a = document.getElementById("succ");
	var goodColor = "#0000ff";	

	a.style.color = goodColor;
	a.innerHTML = "Successfully Added!"
}

function showUserA(){
	var a = document.getElementById("searchbut");
	a.innerHTML = "Artist";
	
}

function showUserM(){
	var a = document.getElementById("searchbut");
	a.innerHTML = "Movie";
}

function searchMedia(){
	xmlhttp = new XMLHttpRequest();
	var a = document.getElementById("searchbut");
	var b = document.getElementById("mediasearch");
	
	if(a.innetHTML == "Artist"){
	
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			document.getElementById("results").innerHTML = this.responseText;
		}
	};

	xmlhttp.open("GET", "artistsearch.php?q=" + b.value, true);
	xmlhttp.send();
	}
	else {

	xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200){
                        document.getElementById("results").innerHTML = this.responseText;
                }
        };

        xmlhttp.open("GET", "moviesearch.php?q="+b.value , true);
        xmlhttp.send();

	}
}
</script>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>No0bZ</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">No0bZ</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">Add+<span class="caret"></span></a>
	    <ul class="dropdown-menu">
		<li><a href="addartist.php">Fav. Artist</a></li>
		<li><a href="upalbums.php">Upcoming Albums</a></li>
		<li><a href="upmovies.php">Upcoming Movie</a></li>
	    </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="logout.php">Log Out</a>
          </li>
        </ul>
        <form method="post" action="/mediasearch.php" class="form-inline mt-2 mt-md-0">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <div class="input-group-btn">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" id="searchbut" name="searchbut" aria-expanded="false">Search:<span class="caret"></span></button>
	 <ul class="dropdown-menu">
          <li><a onclick="showUserA()">Artist</a></li>
          <li><a onclick="showUserM()">Movie</a></li>
        </ul>
	</div><!-- /btn-group -->
      <input type="text" name="mediasearch" id="mediasearch" class="form-control" aria-label="...">
	<button onclick="searchMedia()" type="button" name="search" id="search" class="btn btn-default" aria-haspopup="true" aria-expanded="false">Submit<span class="caret"></span></button>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<br><span id="results" name="results"></span>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>




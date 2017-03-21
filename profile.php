<?php
include('session.php');

?>
<!DOCTYPE html>
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
	<script>
		function upcomingMovies(){
		var a = document.getElementById("newsfeed");
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
				a.innetHTML = this.responseText;
				}
			};
		xmlhttp.open("GET", "newsfeed.php", true);
		xmlhttp.send();
		}
		function wishMovies(){

		}

		function favArtist(){

		}
	</script>

	<style>
	body {
	 background: #F1F3FA;
	}

/* Profile container */
	.profile {
  	margin: 20px 0;
	}

/* Profile sidebar */
	.profile-sidebar {
  	padding: 20px 0 10px 0;
  	background: #fff;
	}

	.profile-userpic img {
  	left: 25px;
	float: none;
  	margin: 0 auto;
  	width: 50%;
  	height: 50%;
  	-webkit-border-radius: 50% !important;
  	-moz-border-radius: 50% !important;
  	border-radius: 50% !important;
	}

	.profile-usertitle {
  	text-align: center;
  	margin-top: 20px;
	}

	.profile-usertitle-name {
  	color: #5a7391;
  	font-size: 16px;
  	font-weight: 600;
  	margin-bottom: 7px;
	}

	.profile-usertitle-job {
  	text-transform: uppercase;
  	color: #5b9bd1;
  	font-size: 12px;
  	font-weight: 600;
  	margin-bottom: 15px;
	}

	.profile-userbuttons {
  	text-align: center;
  	margin-top: 10px;
	}

	.profile-userbuttons .btn {
  	text-transform: uppercase;
  	font-size: 11px;
  	font-weight: 600;
  	padding: 6px 15px;
  	margin-right: 5px;
	}
    
	.profile-usermenu {
  	margin-top: 30px;
	}

	.profile-usermenu ul li {
  	border-bottom: 1px solid #f0f4f7;
	}

	.profile-usermenu ul li:last-child {
  	border-bottom: none;
	}

	.profile-usermenu ul li a {
  	color: #93a3b5;
  	font-size: 14px;
  	font-weight: 400;
	}

	.profile-usermenu ul li a i {
  	margin-right: 8px;
  	font-size: 14px;
	}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
	</style>
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
            <a class="nav-link active" href="/logout.php">Log Out</a>
          </li>
        </ul>
        <form method="post" action="/mediasearch.php" class="form-inline mt-2 mt-md-0">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
<div class="container">
<div class="row profile">
<div class="col-md-3">
<div class="profile-sidebar">
<div class="profile-userpic">
<img src="/user.jpeg" class="img-responsive" alt=""></div>
<div class="profile-usertitle">
<div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
</div>
<div class="profile-userbuttons">
<form class="profile-userbuttons" method="post">
<button type="button" onclick="upcomingMovies()" class="btn btn-success btn-sm">Upcoming Movies</button>
</form>
<form class="profile-userbuttons" method="post">
<button type="button" onclick="favArtist()" class="btn btn-success btn-sm">Fav. Artist</button>
</form>
<form class="profile-userbuttons"  method="post">
<button type="button"onclick="wishMovies()" class="btn btn-success btn-sm">Wish List</button>
</form>
</div>
</div>
</div>
<div class="col-md-9">
<div class="profile-content">
	<center><h1 id="notification" name="notification">Welcome!</h1></center>
	<span name="newsfeed" id="newsfeed"></span>
</div>
</div>
</div>
</div>
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


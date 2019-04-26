<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Quiz App</title>
  
  </head>
  <body style="font-family: 'Helvetica';">
	<?php
		session_start();
	?>
	
	<div class="myNav">
		<nav class="navbar navbar-expand-lg navbar-light ">
		<a class="navbar-brand mx-auto" href="welcome.php">Quiz App</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
		</div>
		
		<li class="loggedIn">
			<p class="loggedIn">Logged in as <?php echo ("{$_SESSION['username']}"." ");  ?> </p>
		</li>
		<form class="form-inline" action="welcome.php" method="post">
			<input type="hidden" name="form" value="logout">
			<button class="btn btn-dark my-2 my-sm-0" type="submit">Logout</button>
		</form>
		</nav>
	</div>
	<section id="hero">
		<div class="h-txt text-light">
			<div class="starter-template">
				 <h1 style="font-weight:bolder; text-shadow: 2px 2px 8px #000000;"> Quiz sharing has never been easier. </h1>
				<p class="lead" style="text-shadow: 2px 2px 8px #000000;"> Search millions of existing courses, and quizzes to take or create your own!</p>
			</div>
		</div>
	</section>
	
	<br><br>
	<div class="row" style="margin-left:20px;">
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Manage Courses</h5>
					<p class="card-text">Create, view statistics, and close a course.</p>
					<a href="#" class="btn btn-primary">Manage Courses</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Manage Quizzes</h5>
					<p class="card-text">Create, edit, view, and close quizzes.</p>
					<a href="#" class="btn btn-primary">Manage Quizzes</a>				
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Take a Quiz</h5>
					<p class="card-text">Take an existing quiz.</p>
					<a href="#" class="btn btn-primary">Take a Quiz</a>
				</div>
			</div>
		</div>
	</div>
	
	<?php
		if(isset($_POST['form'])){
			switch($_POST['form']){
				case 'logout':
					session_destroy();
					header('Location: main.php');
			}

		}
	?>
	
  
  
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
  
</html>
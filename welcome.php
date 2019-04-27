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
  <body style="font-family: 'Helvetica'; background-color: #a6b2c4; background-image: url('pic.jpg'); background-size: cover;">
	<?php
		session_start();
	?>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="welcome.php" style="text-shadow: 2px 2px 8px #000000;">Quiz App</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
			</li>
			<li class="nav-item">	
				<div class="dropdown">
					<button class="btn btn-outline-dark dropdown-toggle" type="button" id="manageCoursesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; text-shadow: 2px 2px 8px #000000;">
						Manage Courses
					</button>
					<div class="dropdown-menu" aria-labelledby="manageCoursesDropdown">
						<a class="dropdown-item" href="manageCourses.php?create">Create a course</a>
                        <a class="dropdown-item" href="manageCourses.php?edit">Edit a course</a>
                        <a class="dropdown-item" href="manageCourses.php?view">View courses</a>
					</div>
				</div>
			</li>
            <li class="nav-item">	
				<div class="dropdown">
					<button class="btn btn-outline-dark dropdown-toggle" type="button" id="manageQuizzesDropdown" data-toggle="dropdown" style="color:white; text-shadow: 2px 2px 8px #000000;">
						Manage Quizzes
					</button>	
					<div class="dropdown-menu" aria-labelledby="manageQuizzesDropdown">
						<a class="dropdown-item" href="manageQuizzes.php?create">Create a quiz</a>
						<a class="dropdown-item" href="manageQuizzes.php?edit">Edit a quiz</a>
						<a class="dropdown-item" href="manageQuizzes.php?view">View a quiz</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<a href="userProfile.php" class="btn btn-outline-dark">User Profile</a>
			</li>
    	<li class="nav-item">
        <a class="btn btn-outline-dark" href="quizTaker.php" style="color:white; text-shadow: 2px 2px 8px #000000;">Take a quiz</a>
      </li>
		</ul>
	</div>
	<li class="loggedIn">
			<p class="loggedIn">Logged in as <?php echo ("{$_SESSION['username']}" . " ");  ?> </p>
	</li>	
	<form class="form-inline" action="manageCourses.php" method="post">
		<input type="hidden" name="form" value="logout">
		<button class="btn btn-dark my-2 my-sm-0" type="submit" style="text-shadow: 2px 2px 8px #000000;">Logout</button>
	</form>
    </nav>
	<div class="hero">
	<section id="hero">
		<div class="h-txt text-light">
			<div class="starter-template">
				 <h1 style="font-weight:bolder; text-shadow: 2px 2px 8px #000000;"> Quiz sharing has never been easier. </h1>
				<p class="lead" style="text-shadow: 2px 2px 8px #000000;"> Search millions of existing courses, and quizzes to take or create your own!</p>
			</div>
		</div>
	</section>
	</div>
	
	<br><br>

	<div class="homeSplash">
	<div class="row" style="margin-left:20px;">
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Manage Courses</h5>
					<p class="card-text">Create, view statistics, and close a course.</p>
					<a href="manageCourses.php" class="btn btn-primary">Manage Courses</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Manage Quizzes</h5>
					<p class="card-text">Create, edit, view, and close quizzes.</p>
					<a href="manageQuizzes.php" class="btn btn-primary">Manage Quizzes</a>				
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Take a Quiz</h5>
					<p class="card-text">Take an existing quiz.</p>
					<a href="quizTaker.php" class="btn btn-primary">Take a Quiz</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
				<div class="card-body">
					<h5 class="card-title">User Profile</h5>
					<p class="card-text">View your personal statistics.</p>
					<a href="userProfile.php" class="btn btn-primary">View Profile</a>
				</div>
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
		<script type="text/javascript" src="main.js"></script>
		<script type="text/javascript" src="welcome.js"></script>
  </body>
  
</html>
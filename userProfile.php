<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Quiz App</title>
  
  </head>
  <?php session_start(); ?>
  <body style="background-image: url('pic6.jpg'); background-size: cover;">
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
				<a href="userProfile.php" class="btn btn-outline-dark" style="color:white; text-shadow: 2px 2px 8px #000000;">User Profile</a>
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


	<?php
		$mysqli = new mysqli( 'localhost', 'root', '', 'quizapp');
		if($mysqli->connect_error){
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
		}
		else{
			$sql = "SELECT quiz.Quiz_Name, quiz.Quiz_Description, quiz_log.Quiz_Score, quiz_log.Quiz_Date FROM quiz INNER JOIN quiz_log ON quiz.quiz_ID = quiz_log.quiz_ID WHERE User_ID_Take = ".$_SESSION['id'];

			//$result = $mysqli->query($sql);

			$result = $mysqli->query($sql);

			if (!$result) {
			    trigger_error('Invalid query: ' . $mysqli->error);
			}
		}
	?>
	<div class="profileHome">
		<button type="button" id="viewQuizHistory" class="btn btn-primary">View Quiz History</button>
		<button type="button" id="viewCourseHistory" class="btn btn-primary">View Course History</button>
		<a href="viewCurrentCourses.php"  id="viewCurrentCourses" class="btn btn-primary">View Current Courses</button>
	</div>
	
	<?php
		$courseHisto = mysqli_query($mysqli, "SELECT course.course_name as course_name, course.course_description as course_description, course_log.course_status as course_status FROM course_log, course WHERE course_log.user_id = " . $_SESSION['id'] . " AND course.course_id = course_log.course_id AND course_log.course_status IS NOT NULL");

	?>
	<div class="courseHistory">
		<section id="hero6">
			<div class="container profile h-txt text-dark starter-template" style="font-weight:bolder;">
			<?php
				if ($courseHisto) {
					echo "<h1 style='text-shadow: 1px 1px 1px #000000;'>You have completed " . $courseHisto->num_rows . " courses.</h1><br>";
					while($userhisto = mysqli_fetch_assoc($courseHisto)) {
						echo $userhisto['course_name'] . ": " . $userhisto['course_description'] . " | Status: " . $userhisto['course_status'] . "<br>";
					}
				}
				else{
					echo "You haven't completed any courses yet!";
				}

				mysqli_close($mysqli);
				?>
				<button type="button" class="btn btn-primary goToHome">Go back</button>
			</div>
		</section>
	</div>

	<div class="quizHistory">
		<section id="hero6">
			<div class="container profile h-txt text-dark starter-template" style="font-weight:bolder;">
			<?php
				if ($result->num_rows > 0) {
					echo "<h1 style='text-shadow: 1px 1px 1px #000000;'>You have taken ".$result->num_rows ." quizzes.</h1><br>";
					while($userhisto = mysqli_fetch_assoc($result)) {
						echo $userhisto['Quiz_Name'].": ".$userhisto['Quiz_Description']." | Score: ".$userhisto['Quiz_Score']." | Date: ".$userhisto['Quiz_Date']."<br>";
					}
				}
				else{
					echo "You haven't taken any quizzes yet. Proceed to Take a Quiz to do so.";
				}

				mysqli_close($mysqli);
				?>
				<button type="button" class="btn btn-primary goToHome">Go back</button>
			</div>
		</section>
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
	
  
  
		
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="userProfile.js"></script>
  
  </body>
  
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Manage Quizzes</title>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="welcome.php">Quiz App</a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">	
				<li class="nav-item active">
					<a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">	
					<div class="dropdown">
						<button class="btn btn-outline-dark dropdown-toggle" type="button" id="manageQuizzesDropdown" data-toggle="dropdown">
							Manage Quizzes
						</button>	
						<div class="dropdown-menu" aria-labelledby="manageQuizzesDropdown">
							<a class="dropdown-item" href="">Create a quiz</a>
							<a class="dropdown-item" href="">Edit a quiz</a>
							<a class="dropdown-item" href="">View a quiz</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
			
		<form class="form-inline" action="main.php">
			<input type="hidden" name="form" value="logout">
			<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Logout</button>
		</form>
		
    </nav>
    <br>

    <div class="row home">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create a quiz!</h5>
                <p class="card-text">Create a quiz for your quizzes.</p>
                <button type="button" class="btn btn-primary-outline" onclick="createQuiz()">Go!</button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit a quiz!</h5>
                <p class="card-text">Change the details of a quizzes.</p>
                <button type="button" class="btn btn-primary-outline" onclick="editQuiz()">Go!</button>
            </div>
        </div> 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View quizes!</h5>
                <p class="card-text">Check the list of all quizzes.</p>
                <button type="button" class="btn btn-primary-outline" onclick="viewQuizzes()">Go!</button>
            </div>
        </div> 
    </div>
	
	<div align="center" id="container">
		<div class="card" style="width: 50rem;">
			<div class="container createCourse">
				<h5>Creating a quiz... </h5>
				
				<form action="manageCourses.php" method="post">
					<div class="form-group">
						<label for="createCourseName">Quiz Name</label>
						<input type="text" class="form-control" id="createCourseName">
					</div>
					<div class="form-group">
						<label for="createCourseDesc">Quiz Description</label>
						<input type="text" class="form-control" id="createCourseDesc">
					</div>
					<div class="form-group">
						<label for="createCourseDesc">Quiz Difficulty</label>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="difficultyCheck1">
								<label class="form-check-label" for="difficultyCheck1">
									Easy
								</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="difficultyCheck2">
								<label class="form-check-label" for="difficultyCheck2">
									Medium
								</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="difficultyCheck3">
								<label class="form-check-label" for="difficultyCheck3">
									Hard
								</label>
						</div>
					</div>
					<div class="form-group">
						<label for="createCourseDesc">Quiz Passing Score</label>
						<input type="text" class="form-control" id="createCourseDesc">
					</div>
					<input type="hidden" name="form" value="createCourse">
					<button type="submit" class="btn btn-primary">Create!</button>
					
				</form>
				<br>
			</div>
		</div>
	</div>
	
	<br><br>
	
	<div align="center">	
		<div class="card" style="width: 50rem;">
			<div class="container editCourse">
				<h5>Editing a quiz... </h5>
				<p class="lead">Pick a quiz to edit</p>
					<select class="chooseCourseToEdit">

				</select>
			</div>
		</div>
	</div>

    <div class="container viewCourses">
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
    <script type="text/javascript" src="manageQuizzes.js"></script>
  </body>
</html>
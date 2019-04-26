<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
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
							<a class="dropdown-item" href="manageQuizzes.php?create">Create a quiz</a>
							<a class="dropdown-item" href="manageQuizzes.php?edit">Edit a quiz</a>
							<a class="dropdown-item" href="manageQuizzes.php?view">View a quiz</a>
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
	
	 <?php
		
		if (isset($_POST["create"])) {
		$conn = new mysqli('localhost','pio', '', 'quizapp');

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			$conn->close(); 
		}
		
		//echo "Connected successfully";
		$sql = "INSERT INTO MyGuests (firstname, lastname, email)
		VALUES ('John', 'Doe', 'john@example.com')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		
		}
		// Create connection

		
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}		
	?> 

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
	
	<div align="center" id="createQuiz">
		<div class="" style="width: 50rem;">
			<h5>Creating a quiz...</h5>		
			<form action="manageQuizzes.php" method="post">
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
					<select class="custom-select" id="quizDifficulty">
					  <option selected disabled>Choose the difficulty...</option>
					  <option value="easy">Easy</option>
					  <option value="medium">Medium</option>
					  <option value="hard">Hard</option>
					</select>
				</div>
				<div class="form-group">
					<label for="createCourseDesc">Quiz Passing Score</label>
					<input type="text" class="form-control" id="createCourseDesc">
				</div>
				
				<label class="form-check-label">
					Quiz Type	<br>
				</label>
				
				<select onchange="clearQuestionContainer()" onclick="getQuizType()" class="custom-select" id="quizType">
				  <option selected disabled>Choose the quiz type...</option>
				  <option value="identification">Identification</option>
				  <option value="multipleChoice">Multiple choice</option>
				  <option value="matchingType">Matching type</option>					  
				  <option value="trueOrFalse">True or False</option>
				</select>
				
				<div class="form-group">
					<label for="quizTags">Tags</label>
					<input type="text" class="form-control" id="quizTags">
				</div>
				
				<br><br>
				
				<button type="button" class="btn btn-primary" onclick="addQuestion()">Add question</button>
				
				<br><br>
				
				<input type="hidden" name="form" value="createCourse">
			
				<button type="submit" class="btn btn-primary" name="create">Create!</button>
				<button class="btn btn-primary" onclick="goBackToHome()">Go back</button>
			</form>
		</div>
		<br>
		<div align="center" id="questionContainer">
		</div>
	</div>
	
	
	
	<div class="container" align="center" id="editQuizzes">	
		<div class="" style="width: 50rem;">
			<div class="container">
				<h5>Editing a quiz... </h5>
				<p class="lead">Pick a quiz to edit</p>					
				<select class="">

				</select>
				
				<button type="submit" class="btn btn-primary">Create!</button>
				<button class="btn btn-primary" onclick="goBackToHome()">Go back</button>
			</div>
		</div>
	</div>

    <div class="container" align="center" id="viewQuizzes">
		<div class="" style="width: 50rem;">
		<h5>View Quizzes </h5>
	
	
	
	<button type="submit" class="btn btn-primary">Create!</button>
	<button class="btn btn-primary" onclick="goBackToHome()">Go back</button>
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
    <script type="text/javascript" src="initManageQuizzes.js"></script>
	<script type="text/javascript" src="manageQuizzes.js"></script>
  </body>
</html>
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
  <body style="background-image: url('pic4.jpg'); background-size: cover;">
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
    <br>
	
	<section id="hero5">
		<div class="h-txt text-dark">
			<div class="starter-template">
				 <h1 style="font-weight:bolder;"> Manage Quizzes </h1>
				<p class="lead" style="text-shadow: 1px 1px 1px #000000;"> Search millions of existing courses, and quizzes to take or create your own!</p>
			</div>
		</div>
	</section>
	 <?php
		if (isset($_POST["create"])) {
		
		if(empty($_POST["createQuizName"])){
            echo "<script>alert('No quiz name entered!')</script>";
			echo "<script>window.location.href = 'manageQuizzes.php?create' </script>";
        }
		
		if(empty($_POST["createQuizDescription"])){
            echo "<script>alert('No quiz description entered!')</script>";
			echo "<script>window.location.href = 'manageQuizzes.php?create' </script>";
        }
		
		if(empty($_POST["quizDifficulty"])){
            echo "<script>alert('No quiz difficulty entered!')</script>";
			echo "<script>window.location.href = 'manageQuizzes.php?create' </script>";
        }
		
		if(empty($_POST["quizPassingScore"])){
            echo "<script>alert('No quiz passing score entered!')</script>";
			echo "<script>window.location.href = 'manageQuizzes.php?create' </script>";
        }
		
		$newName = test_input($_POST["createQuizName"]);
		$newDesc = test_input($_POST["createQuizDescription"]);
		$newDiff = test_input($_POST["quizDifficulty"]);
		$newPass = test_input($_POST["quizPassingScore"]);
		$id = $_SESSION["id"];
		
		$conn = new mysqli('localhost','root', '', 'quizapp');

		// Check connection
		if ($conn->connect_error) {
			die("");
			$conn->close(); 
		}
		
		//echo "Connected successfully";
		$sql ="INSERT INTO quiz (Quiz_ID, Quiz_Name, Quiz_Difficulty, Quiz_Description, Course_ID, Quiz_PassingScore, User_ID) VALUES 
		(NULL, '$newName', '$newDiff', '$newDesc', '0', '$newPass', '$id')";
		
		//mysqli_query($con, "INSERT INTO course (user_id, course_name, course_description, course_isopen) VALUES ($id, '$newName', '$newDesc', 1)");

		$conn->close();
		session_destroy();
		}
		// Create connection

		
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}		
	?> 

    <div class="row home" style="margin-top:-250px; margin-left: 30px;">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5 class="card-title">Create a quiz!</h5>
                <p class="card-text">Create a quiz for your quizzes.</p>
                <button type="button" class="btn btn-primary-outline" onclick="createQuiz()">Go!</button>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5 class="card-title">Edit a quiz!</h5>
                <p class="card-text">Change the details of a quizzes.</p>
                <button type="button" class="btn btn-primary-outline" onclick="editQuiz()">Go!</button>
            </div>
        </div> 
        <div class="card text-white bg-dark mb-3">
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
					<label>Quiz Name</label>
					<input type="text" class="form-control" name="createQuizName">
				</div>
				<div class="form-group">
					<label>Quiz Description</label>
					<input type="text" class="form-control" name="createQuizDescription">
				</div>
				<div class="form-group">
					<label for="createCourseDesc">Quiz Difficulty</label>
					<select class="custom-select" name="quizDifficulty">
					  <option selected disabled>Choose the difficulty...</option>
					  <option value="EASY">Easy</option>
					  <option value="MEDIUM">Medium</option>
					  <option value="HARD">Hard</option>
					</select>
				</div>
				<div class="form-group">
					<label for="createCourseDesc">Quiz Passing Score</label>
					<input type="text" class="form-control" name="quizPassingScore">
				</div>
				
				<label class="form-check-label">
					Quiz Type	<br>
				</label>
				
				<select onchange="clearQuestionContainer()" onclick="getQuizType()" class="custom-select" id="quizType" name="quizType">
				  <option selected disabled>Choose the quiz type...</option>
				  <option value="identification">Identification</option>
				  <option value="multipleChoice">Multiple choice</option>
				  <option value="matchingType">Matching type</option>					  
				  <option value="trueOrFalse">True or False</option>
				</select>
				
				<!--<div class="form-group">
					<label for="quizTags">Tags</label>
					<input type="text" class="form-control" id="quizTags">
				</div>-->
				
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

				<form action="editingQuiz.php" method="post" id="editQuizForm">
            		<input type="hidden" name="form" value="editQuiz">
            		<select class="chooseCourseToEdit form-control" name="quizToEdit" form="editQuizForm">
            		<?php
                		$con = mysqli_connect('localhost', 'root', '', 'quizapp');

                		if(mysqli_connect_errno()){
                    		echo "Failed to connect to database! " . mysqli_connect_error();
                    		die();
                		}

                		$id = $_SESSION['id'];

                		$result = mysqli_query($con, "SELECT quiz_name FROM quiz WHERE user_id = $id");

                		if(mysqli_num_rows($result) > 0){
                    		while($row = mysqli_fetch_array($result)){
                        		echo "<option value=\"" . $row['quiz_name'] . "\">" . $row['quiz_name'] . "</option>";
                    		}
                		}
                		else{
                    		echo "<option>Uh oh! You haven't made any quizzes yet!</option>";
                		}		


                		mysqli_close($con);
            		?>
            		</select> <br> <br>
            		<button type="submit" class="btn btn-primary">Edit!</button>
            		<button type="button" class="btn btn-primary" onclick="goBackToHome();">Go back</button>
        		</form>
			</div>
		</div>
	</div>

    <div class="container viewQuizzes" style="text-shadow: 4px 4px 8px #000000;" id="viewQuizzes">
        <h4>Viewing all quizzes... </h4>
        <hr>
        <table class="table">
            <thead>
                <tr>
					<th scope="col">Quiz Name</th>
                    <th scope="col">Quiz Description</th>
					<th scope="col">Quiz Difficulty</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $con = mysqli_connect('localhost','root', '', 'quizapp');

                    if(mysqli_connect_errno()){
                        echo "Failed to connect to database! " . mysqli_connect_error();
                        die();
                    }

                    $result = mysqli_query($con, "SELECT quiz_name, quiz_description, quiz.quiz_difficulty FROM quiz,course WHERE quiz.Course_ID = course.Course_ID AND course.Course_isOpen = 1");

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['quiz_name'] . "</td>";
                        echo "<td>" . $row['quiz_description'] . "</td>";
						echo "<td>" . $row['quiz_difficulty'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onclick="goBackToHome();">Go back</button>
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
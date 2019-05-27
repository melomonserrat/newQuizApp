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
  <body style="background-image: url('pic7.jpg'); background-size: cover;">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="welcome.php">Quiz App</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item">	
					<div class="dropdown">
						<button class="btn btn-outline-dark dropdown-toggle" type="button" id="manageCoursesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; text-shadow: 2px 2px 8px #000000;">
							Manage Courses
						</button>

						<div class="dropdown-menu" aria-labelledby="msanageCoursesDropdown">
							<a class="dropdown-item" href="javascript:manageCourse()">Manage a course</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		
		<form class="form-inline" action="quizmaker.php">
			<input type="hidden" name="form" value="logout">
			<button class="btn btn-dark my-2 my-sm-0" type="submit" style="text-shadow: 2px 2px 8px #000000;">Logout</button>
		</form>
	</nav>



	<?php session_start();?>
	<div align="center" class="resultContainer">
	<h1>You took the quiz: <?php echo $_POST['quizName']; ?></h1>
	
	<?php
	$mysqli = new mysqli( 'localhost', 'root', '', 'quizapp');
		if($mysqli->connect_error){
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
		}else{
			$sql = "SELECT * FROM question where Quiz_ID = ".$_POST['quizID'];
			$result = $mysqli->query($sql);
			$count = 1;
			$score = 0;
			while($question = mysqli_fetch_assoc($result)) {
				$index = "question".$count;
				if($question['Question_Answer'] == $_POST[$index]){
					$score++;
				}
				$count++;
			}

			echo "<h3>".$_SESSION['username'].', your score is: '.$score;
			if($score > ($count/10)*6){
				echo ". Congratulations you passed!</h3>";
			}else{
				echo ". You failed, try again and study harder next time!</h3>";
			}

			$formated_date = date("Y-m-d", time());

			$sql = "INSERT INTO quiz_log (Quiz_ID, User_ID_Take, Quiz_Score, Quiz_Date) VALUES (".$_POST['quizID'].",".$_SESSION['id'].",".$score.",'".$formated_date."')";

			if(mysqli_query($mysqli, $sql)){
				echo "<span>Your record has been updated! Thank you for using QuizApp</span>";
			} else{
			    echo "<span>Ohno! You have already taken this quiz today, this try will not be recorded. Come back tommorow.</span>.";
			}
		}
	?>
	<p>You will be redirected in <span id="counter">10</span> second(s).</p>
	<script type="text/javascript">
	function countdown() {
	    var i = document.getElementById('counter');
	    if (parseInt(i.innerHTML)<=0) {
	        location.href = 'welcome.php';
	    }
	    i.innerHTML = parseInt(i.innerHTML)-1;
	}
	setInterval(function(){ countdown(); },1000);
	</script>

	</div>
	<?php if(isset($_POST['form'])){
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
		<script type="text/javascript" src="welcome.js"></script>
  
  </body>
  
</html>
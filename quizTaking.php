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
  <body style="background-image: url('pic5.jpg'); background-size: cover;">
  	<?php
		session_start();
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<a class="navbar-brand" href="welcome.php" style="text-shadow: 2px 2px 8px #000000;">Quiz App</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">

			</ul>
		</div>
		<li class="loggedIn">
			<p class="loggedIn">Logged in as <?php echo ("{$_SESSION['username']}" . " ");  ?> </p>
		</li>
		<form class="form-inline" action="quizmaker.php">
			<input type="hidden" name="form" value="logout">
			<button class="btn btn-dark my-2 my-sm-0" type="submit" style="text-shadow: 2px 2px 8px #000000;">Logout</button>
		</form>
	</nav>
	<br><br>

	<h3 style="font-weight:bolder; text-shadow: 4px 4px 8px #000000; color:white; text-align:center;">You are currently taking the quiz: <?php echo $_POST['quizName']; ?></h3>
	<form method="post" action="results.php" >
	<?php
		$mysqli = new mysqli( 'localhost', 'root', '', 'quizapp');
		if($mysqli->connect_error){
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
		}else{
			$sql = "SELECT * FROM question where Quiz_ID = ".$_POST['quizID'];
			$result = $mysqli->query($sql);
			$count =0;
			while($question = mysqli_fetch_assoc($result)) {
				if($question['Question_Type'] == 'MC'){
					$sql = "SELECT * FROM multiplechoice where Question_ID = ".$question['Question_ID'];
					$choices = $mysqli->query($sql); ?>
					<div class="card" align="center">
						<div class="card-body text-center">
							<div class="title">
								<h4><?php 
								$count++; 
								echo $count.": ". $question['Question_Description']; ?></h4>
							</div>
							<div class="desc" align="text-left"><?php
								while($choice = mysqli_fetch_assoc($choices)){
									echo "A: ".$choice['Choice1']."<br>"."B: ".$choice['Choice2']."<br>"."C: ".$choice['Choice3']."<br>"."D: ".$choice['Choice4']."<br>";
								}
								echo "<br><input type='radio' name='question".$count."'"." value = 'A' ".">A";
								echo "<input type='radio' name='question".$count."'"." value = 'B' ".">B";
								echo "<input type='radio' name='question".$count."'"." value = 'C' ".">C";
								echo "<input type='radio' name='question".$count."'"." value = 'D' ".">D";
							?>	
							</div>
						</div>
					</div>
				<?php }else if($question['Question_Type'] == 'I'){?>
					<div class="card" align="center">
						<div class="card-body text-center">
							<div class="title">
								<h4><?php 
								$count++; 
								echo $count.": ". $question['Question_Description']; ?></h4>
							</div>
							<div class="desc" align="text-left"><?php
								//echo "Answer: ".$question['Question_Answer'];
								echo "<br><input type='text' maxlength='50' name='question".$count."'>";
							?>	
							</div>
						</div>
					</div>
				<?php }else if($question['Question_Type'] == 'ToF'){?>
					<div class="card" align="center">
						<div class="card-body text-center">
							<div class="title">
								<h4><?php 
								$count++; 
								echo $count.": ". $question['Question_Description']; ?></h4>
							</div>
							<div class="desc" align="text-left"><?php
							// echo "Answer: ".$question['Question_Answer'];
								echo "<br><input type='text' maxlength='5' name='question".$count."'>";
				}?>	
							</div>
						</div>
					</div>
			<?php }
		}
	?>
	<input type="hidden" name="quizID" value="<?php echo $_POST['quizID'];?>">
	<input type="hidden" name="quizName" value="<?php echo $_POST['quizName'];?>">
	<input type="submit" name="submitQuiz" value="Submit" class="btn btn-dark my-2 my-sm-0" style="text-shadow: 2px 2px 8px #000000; text-align:center;">

	</form>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="welcome.js"></script>
  
  </body>
  
</html>
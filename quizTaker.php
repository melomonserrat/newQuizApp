<!DOCTYPE HTML>
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
						<button class="btn btn-outline-dark dropdown-toggle" type="button" id="manageCoursesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Manage Courses
						</button>

						<div class="dropdown-menu" aria-labelledby="manageCoursesDropdown">
							<a class="dropdown-item" href="javascript:manageCourse()">Manage a course</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		
		<form class="form-inline" action="quizmaker.php">
			<input type="hidden" name="form" value="logout">
			<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Logout</button>
		</form>
	</nav>
	
	<div><h3>Quiz List</h3></div>
	<div class="container">
	<div class="row">
	<?php
		//session_start();
		$mysqli = new mysqli( 'localhost', 'root', '', 'newquizapp');
		if($mysqli->connect_error){
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
		}else{
			$sql = "SELECT * FROM course";
			$result = $mysqli->query($sql);


			if ($result->num_rows > 0) {
			    // output data of each row
			    while($record = mysqli_fetch_assoc($result)) {?>
					<div class="card hovercard col-xl-3 col-md-6 mb-4 ">
					<div class="card-body info">
					<div class="title">
						<span><?php echo $record['Course_Name']; ?></span>
					</div>
					<div class="desc"><?php echo $record['Course_Description']; ?></div>
					</div>
					</div>
				<?php }
			} else {
			    echo "0 results";
			}
		}
		$mysqli->close();
	?>

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
	
  
  
		
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="welcome.js"></script>
  
  </body>
  
</html>
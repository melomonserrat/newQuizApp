<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Quiz App</title>
  
  </head>
  <body style="background-image: url('pic5.jpg'); background-size: cover;">
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
	<section id="hero4">
		<div class="h-txt text-light">
			<div class="starter-template">
				 <h1 style="font-weight:bolder; text-shadow: 4px 4px 8px #000000;"> Take a Quiz </h1>
				<p class="lead" style="text-shadow: 4px 4px 8px #000000;"> Pick a quiz from its corresponding course that you would like to take.</p>
			</div>
		</div>
	</section>
	
	<div class="card-columns" align="center">
	<?php
		//session_start();
		$mysqli = new mysqli( 'localhost', 'root', '', 'quizapp');
		if($mysqli->connect_error){
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
		}else{
			$sql = "SELECT * FROM course";
			$result = $mysqli->query($sql);
			$count = 0;

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($record = mysqli_fetch_assoc($result)) {


			    	$sql1 = "SELECT * FROM quiz WHERE Course_ID = ". $record['Course_ID'];
			    	$quizCourseID = $mysqli->query($sql1);
			    	$count = $count +1;
	?>	
		<div class="container cardQuiz">
			<div class="card text-white bg-dark mb-0" style="margin-top:50px; margin-left:275px; max-width: 25rem;">
				<div class="card-body text-center">
					<div class="title">
						<h4><?php echo $record['Course_Name']; ?></h4>
					</div>
					<div class="desc"><?php echo $record['Course_Description']; ?></div>
				</div>
					<button type="button" class="btn btn-primary" data-toggle="modal" <?php echo "data-target='#myModal".$count."'" ?> >View Quiz List</button>
			</div>
		</div>

		<div class="modal" <?php echo "id='myModal". $count."'" ?> >
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

				 <!-- Modal Header -->
					<div class="modal-header">
					    <h4 class="modal-title"><?php echo $record['Course_Name']; ?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">
					      		<table class="table-striped">
								  <thead>
								    <tr>
									    <th>Title</th>
									    <th>Difficulty</th>
									    <th>Description<th>
								      	<th>Passing Score</th>
								      	<th> </th>
								    </tr>
								  </thead>
								  <tbody>
					        <?php while($recordQuiz = mysqli_fetch_assoc($quizCourseID)) {?>
				        	    <tr>
							      <td><?php echo $recordQuiz['Quiz_Name']; ?></td>
							      <td><?php echo $recordQuiz['Quiz_Difficulty']; ?></td>
							      <td><?php echo $recordQuiz['Quiz_Description']; ?></td>
							      <td><?php echo $recordQuiz['Quiz_PassingScore']; ?></td>
							      <td><form action="quizTaking.php" method="post">
							      	<input type="hidden" name="quizID" value="<?php echo $recordQuiz['Quiz_ID'];?>">
							      	<input type="hidden" name="quizName" value="<?php echo $recordQuiz['Quiz_Name'];?>">
							      	<input type="submit" name="takeQuiz" value="Take Quiz"></form></td>
							    </tr>
					    	<?php } ?>
					    		  </tbody>
								  </table>
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					      </div>

					    </div>
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
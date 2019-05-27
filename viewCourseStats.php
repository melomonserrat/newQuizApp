<!doctype html>

<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Viewing Course Statistics</title>
    </head>

    <body>
    <?php
        session_start();
        
        if(!isset($_GET['index'])){
            echo "<script>alert('An error has occured!')</script>";
            echo "<script>window.location.replace('welcome.php')</script>";
        }
        else{
            $index = $_GET['index'];
        }
	?>
	<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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


        <br><br><br><br><br>
        <div class="div courseStatistics">
            <?php
                $con = mysqli_connect('localhost', 'root', '', 'quizapp');

                $courseName = mysqli_query($con, "SELECT course_name FROM course WHERE course_id = $index");
                $numTakers = mysqli_query($con, "SELECT COUNT(DISTINCT quiz_log.user_id_take) as totalTakers FROM quiz_log, quiz, course WHERE quiz_log.quiz_id = quiz.quiz_id AND quiz.course_id = $index");

                $totalNumberOfQuizzes = mysqli_query($con, "SELECT COUNT(*) as totalQuizzes FROM quiz WHERE course_id = $index");
                $totalNumberQuizzesTaken = mysqli_query($con, "SELECT quiz_log.user_id_take, COUNT(*) as totalQuizzesTaken FROM quiz_log, quiz WHERE quiz_log.quiz_id = quiz.quiz_id AND quiz.course_id = $index GROUP BY quiz_log.user_id_take");
                $totalNumberCompleters = mysqli_query($con, "SELECT COUNT(DISTINCT quiz_log.user_id_take) as totalCompleters FROM quiz_log WHERE (SELECT quiz_log.user_id_take, COUNT(*) as totalQuizzesTaken FROM quiz_log, quiz WHERE quiz_log.quiz_id = quiz.quiz_id AND quiz.course_id = $index GROUP BY quiz_log.user_id_take) = (SELECT COUNT(*) as totalQuizzes FROM quiz WHERE quiz.course_id = $index)");
                var_dump($totalNumberCompleters);

                $printTotalTaken = mysqli_fetch_assoc($totalNumberQuizzesTaken);
                $printTotalQ = mysqli_fetch_assoc($totalNumberOfQuizzes);
                //echo $printTotalQ['totalQuizzes'];
                //echo $printTotalTaken['totalQuizzesTaken'];


                //$numCompleters = mysqli_query($con, "");
                //var_dump($numCompleters);
                $printTakers = mysqli_fetch_assoc($numTakers);
                $printName = mysqli_fetch_assoc($courseName);
            ?>
            <div class="card">
                <h4 class="card-title"><?php echo $printName['course_name'] ?></h4>
                <h5 class="card-subtitle mb-2 text-muted">Course Statistics</h5>
                <p class="card-text"> Number of Takers: <?php echo $printTakers['totalTakers'] ?></p>
                <p class="card-text"> Number of Completers: <?php //insert number of completers here ?></p>
                <p class="card-text"> Average Completion Rate: <?php //insert ave. completion rate here ?></p>
                <button type="button" class="btn btn-primary" onclick="goBackToHome()">Go back</button>
            </div>
        </div>

        <?php
	    	if(isset($_POST['form'])){
	    		switch($_POST['form']){
	    			case 'logout':
	    				session_destroy();
	    				echo "<script>window.location.href = 'main.php' </script>";
	    		}

	    	}
	    ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="initManageCourses.js"></script>
        <script type="text/javascript" src="manageCourse.js"></script>
        <script type="text/javascript" src="viewStats.js"></script>
    </body>

</html>
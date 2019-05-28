<!doctype html>

<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Viewing Course Statistics</title>
    </head>

    <body style="background-image: url('pic8.jpg'); background-size: cover;">
    <?php
        session_start();
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

                $userCourses = mysqli_query($con, "SELECT course.course_name as course_name, course.course_description as course_desc, course.course_id as course_id FROM course, course_log WHERE course_log.user_id =" .  $_SESSION['id'] . " AND course_log.course_id = course.course_id");
                //var_dump($userCourses);
                //mysqli_close($con);
            ?>
            <div class="card currentCard" >
                <h4 class="card-title">My Current Courses</h4>
                <table class="table" >
                    <thead>
                        <tr>
                            <td scope="col">Course Name</td>
                            <td scope="col">Course Description</td>
                            <td scope="col">Number of Quizzes Taken</td>
                            <td scope="col">Number of Total Quizzes</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($course = mysqli_fetch_assoc($userCourses)){
                                $userId = $_SESSION['id'];
                                $currentCourseId = $course['course_id'];
                                //$quizzesTaken = mysqli_query($con, "");
                                $quizzesTotal = mysqli_query($con, "SELECT COUNT(*) as totalQuizzes FROM quiz WHERE quiz.course_id = $currentCourseId");
                                $totalTaken = mysqli_query($con, "SELECT COUNT(DISTINCT quiz_log.quiz_id) as totalTaken FROM quiz_log, quiz WHERE quiz_log.user_id_take = $userId AND quiz_log.quiz_id = quiz.quiz_id AND quiz.course_id = $currentCourseId");
                                //var_dump($totalTaken);
                                if($quizzesTotal){
                                    $printTotalQuizzes = mysqli_fetch_assoc($quizzesTotal);
                                }

                                if($totalTaken){
                                    $printTotalTaken = mysqli_fetch_assoc($totalTaken);
                                }

                                echo "<tr id=\"$currentCourseId\">";
                                echo "<td>" . $course['course_name'] . "</td>";
                                echo "<td>" . $course['course_id'] . "</td>";
                                if($totalTaken){
                                    echo "<td class=\"totalTaken\">" . $printTotalTaken['totalTaken'] . "</td>";
                                }
                                else{
                                    echo "<td>0</td>";
                                }
                                if($quizzesTotal){
                                    echo "<td class=\"totalQuizzes\">" . $printTotalQuizzes['totalQuizzes'] . "</td>"; 
                                }
                                else{
                                    echo "<td>0</td>"; 
                                }
                                echo "<td><button type=\"button\" class=\"btn btn-primary completeCourse\">Complete Course!</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary goBackCourseList">Go back</button>
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
        <script type="text/javascript" src="viewCurrentCourses.js"></script>
    </body>

</html>
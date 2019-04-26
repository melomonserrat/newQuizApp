<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Manage Courses</title>
  </head>
  <body style="background-image: url('pic3.jpg');">
	<?php
		session_start();
	?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="welcome.php">Quiz App</a>
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
						<a class="dropdown-item" href="">Create a quiz</a>
						<a class="dropdown-item" href="">Edit a quiz</a>
						<a class="dropdown-item" href="">View a quiz</a>
					</div>
				</div>
			</li>
            <li class="nav-item">
                <a class="btn btn-outline-dark" href="quizTaker.php" style="color:white; text-shadow: 2px 2px 8px #000000;">Take a quiz</a>
            </li>
		</ul>
	</div>
	<li class="loggedIn">
			<p class="loggedIn">Logged in as <?php echo ("{$_SESSION['username']}"." ");  ?> </p>
	</li>	
	<form class="form-inline" action="manageCourses.php">
		<input type="hidden" name="form" value="logout">
		<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" style="text-shadow: 2px 2px 8px #000000;">Logout</button>
	</form>
    </nav>
    <br>
	<section id="hero3">
		<div class="h-txt text-light">
			<div class="starter-template">
				 <h1 style="font-weight:bolder; text-shadow: 4px 4px 8px #000000;"> Manage Courses </h1>
				<p class="lead" style="text-shadow: 4px 4px 8px #000000;"> Search millions of existing courses, and quizzes to take or create your own!</p>
			</div>
		</div>
	</section>

    <div class="row home" style="margin-left:800px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create a course!</h5>
                <p class="card-text">Create a course to put quizzes under.</p>
                <button type="button" class="btn btn-primary-outline" onclick="createCourse()">Go!</button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit a course!</h5>
                <p class="card-text">Change the details of a course.</p>
                <button type="button" class="btn btn-primary-outline" onclick="editCourse()">Go!</button>
            </div>
        </div> 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View courses!</h5>
                <p class="card-text">Check the list of all courses.</p>
                <button type="button" class="btn btn-primary-outline" onclick="viewCourses()">Go!</button>
            </div>
        </div> 
    </div>

    <div class="container createCourse">
        <h4>Creating a course... </h4>
        <hr>
        <form action="manageCourses.php" method="post">
            <div class="form-group">
                <label for="createCourseName">Course Name</label>
                <input type="text" class="form-control" id="createCourseName">
            </div>
            <div class="form-group">
                <label for="createCourseDesc">Course Description</label>
                <input type="text" class="form-control" id="createCourseDesc">
            </div>
            <input type="hidden" name="form" value="createCourse">
            <button type="submit" class="btn btn-primary">Create!</button>
            <button type="button" class="btn btn-primary" onclick="goBackToHome();">Go back</button>
        </form>
    </div>

    <div class="container editCourse">
        <h4>Editing a course... </h4>
        <hr>
        <p class="lead">Pick a course to edit</p>

        <form action="editingCourse.php" method="post" id="editCourseForm">
            <input type="hidden" name="form" value="editCourse">
            <select class="chooseCourseToEdit form-control" name="courseToEdit" form="editCourseForm">
            <?php
                $con = mysqli_connect('localhost', 'root', '', 'quizapp');

                if(mysqli_connect_errno()){
                    echo "Failed to connect to database! " . mysqli_connect_error();
                    die();
                }

                $result = mysqli_query($con, 'SELECT course_name FROM course');

                while($row = mysqli_fetch_array($result)){
                    echo "<option value=\"" . $row['course_name'] . "\">" . $row['course_name'] . "</option>";
                }

                mysqli_close($con);
            ?>
            </select> <br> <br>
            <button type="submit" class="btn btn-primary">Edit!</button>
            <button type="button" class="btn btn-primary" onclick="goBackToHome();">Go back</button>
        </form>
    </div>

    <div class="container viewCourses">
        <h4>Viewing all courses... </h4>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $con = mysqli_connect('localhost','root', '', 'quizapp');

                    if(mysqli_connect_errno()){
                        echo "Failed to connect to database! " . mysqli_connect_error();
                        die();
                    }

                    $result = mysqli_query($con, "SELECT course_name, course_description FROM course;");

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "<td>" . $row['course_description'] . "</td>";
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
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="initManageCourses.js"></script>
    <script type="text/javascript" src="manageCourse.js"></script>
  </body>
</html>
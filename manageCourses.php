<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Manage Courses</title>
  </head>
  <body style="background-image: url('pic3.jpg');">
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



    <br><br><br>
	<section id="hero3">
		<div class="h-txt text-light">
			<div class="starter-template">
				 <h1 style="font-weight:bolder; text-shadow: 4px 4px 8px #000000;"> Manage Courses </h1>
				<p class="lead" style="text-shadow: 4px 4px 8px #000000;"> Create, edit, and view existing courses on the database.</p>
			</div>
		</div>
	</section>

    <div class="row home" style="margin-left:800px; margin-top:-50px; ">
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem; max-height: 15rem;">
				<div class="card-body">
					<h5 class="card-title">Create a course!</h5>
					<p class="card-text">Create a course to put quizzes under.</p>
					<button type="button" class="btn btn-primary" onclick="createCourse()">Go!</button>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem; max-height: 25rem;">
				<div class="card-body">
					<h5 class="card-title">Edit a course!</h5>
					<p class="card-text">Change the details of a course.</p>
					<button type="button" class="btn btn-primary" onclick="editCourse()">Go!</button>
				</div>
			</div> 
		</div>
		<div class="col-sm-4">
			<div class="card text-white bg-dark mb-3" style="max-width: 25rem; margin-right:20px; max-height: 25rem;">
				<div class="card-body">
					<h5 class="card-title">View courses!</h5>
					<p class="card-text">Check the list of all courses.</p>
					<button type="button" class="btn btn-primary" onclick="viewCourses()">Go!</button>
				</div>
			</div> 
		</div>
    </div>

    <div class="container createCourse">
        <h4 style="font-weight: bolder; text-shadow: 4px 4px 8px #000000;">Creating a course... </h4>
        <hr class="new1">
        <form action="manageCourses.php" method="post">
            <div class="form-group">
                <label for="createCourseName" style="text-shadow: 4px 4px 8px #000000;">Course Name</label>
                <input type="text" class="form-control" id="createCourseName" name="createName">
            </div>
            <div class="form-group">
                <label for="createCourseDesc" style="text-shadow: 4px 4px 8px #000000;">Course Description</label>
                <input type="text" class="form-control" id="createCourseDesc" name="createDesc">

            </div>
            <input type="hidden" name="form" value="createCourse">
            <button type="submit" class="btn btn-primary">Create!</button>
            <button type="button" class="btn btn-primary" onclick="goBackToHome();">Go back</button>
        </form>
    </div>

    <div class="container editCourse">
        <h4 style="font-weight: bolder; text-shadow: 4px 4px 8px #000000;">Editing a course... </h4>
        <hr class="new1">
        <p class="lead" style="text-shadow: 4px 4px 8px #000000;">Pick a course to edit</p>

        <form action="editingCourse.php" method="post" id="editCourseForm">
            <input type="hidden" name="form" value="editCourse">
            <select class="chooseCourseToEdit form-control" name="courseToEdit" form="editCourseForm">
            <?php
                $con = mysqli_connect('localhost', 'root', '', 'quizapp');

                if(mysqli_connect_errno()){
                    echo "Failed to connect to database! " . mysqli_connect_error();
                    die();
                }

                $id = $_SESSION['id'];

                $result = mysqli_query($con, "SELECT course_name FROM course WHERE user_id = $id");

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value=\"" . $row['course_name'] . "\">" . $row['course_name'] . "</option>";
                    }
                }
                else{
                    echo "<option>Uh oh! You haven't made any courses yet!</option>";
                }


                mysqli_close($con);
            ?>
            </select> <br> <br>
            <button type="submit" class="btn btn-primary">Edit!</button>
            <button type="button" class="btn btn-primary" onclick="goBackToHome();">Go back</button>
        </form>
    </div>

    <div class="container viewCourses" style="text-shadow: 4px 4px 8px #000000;">
        <h4>Viewing all courses... </h4>
        <hr>
        <table class="table" id="courseTable" style="color: white;">
            <thead>
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $con = mysqli_connect('localhost','root', '', 'quizapp');

                    if(mysqli_connect_errno()){
                        echo "Failed to connect to database! " . mysqli_connect_error();
                        die();
                    }

                    $result = mysqli_query($con, "SELECT course_name, course_description, course_id FROM course WHERE course_isopen = 1");

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr id=\"" . $row['course_id'] . "\" class=\"courseTableRow\">";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "<td>" . $row['course_description'] . "</td>";
                        echo "<td><button type=\"button\" class=\"btn btn-primary viewCourseButton\" onclick='viewCourseDetails()'>View</button></td>";
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
                    break;
                case 'createCourse':
                    if(empty($_POST['createName'])){
                        echo "<script>alert('No course name entered!')</script>";
                        echo "<script>window.location.href = 'manageCourses.php?create' </script>";
                    }

                    if(empty($_POST['createDesc'])){
                        echo "<script>alert('No course description entered!')</script>";
                        echo "<script>window.location.href = 'manageCourses.php?create' </script>";
                    }

                    $con = mysqli_connect('localhost', 'root', '', 'quizapp');

                    $newName = test_input($_POST['createName']);
                    $newDesc = test_input($_POST['createDesc']);
                    $id = $_SESSION['id'];

                    mysqli_query($con, "INSERT INTO course (user_id, course_name, course_description, course_isopen) VALUES ($id, '$newName', '$newDesc', 1)");

                    mysqli_close($con);

                    echo "<script>alert('Course created!')</script>";
                    echo "<script>window.location.href = 'manageCourses.php' </script>";
			}
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
	
	<?php
		if(isset($_POST['form'])){
			switch($_POST['form']){
				case 'logout':
					session_destroy();
					echo "<script>window.location.href = 'main.php' </script>";
			}

		}
	?>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="initManageCourses.js"></script>
    <script type="text/javascript" src="manageCourse.js"></script>
    <script type="text/javascript" src="viewStats.js"></script>
  </body>
</html>
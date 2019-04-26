<!DOCTYPE HTML>

<html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <title>Editing a course...</title>
    </head>

    <body>
    <?php
        if(isset($_POST['edited'])){
            if(empty($_POST['editName'])){
                echo "<script>alert('No course name entered!')</script>";
                echo "<script>window.location.href = 'manageCourses.php?edit' </script>";
            }

            if(empty($_POST['editDesc'])){
                echo "<script>alert('No course description entered!')</script>";
                echo "<script>window.location.href = 'manageCourses.php?edit' </script>";
            }

            $id = $_POST['edited'];
            $newName = $_POST['editName'];
            $newDesc = $_POST['editDesc'];
            $newOpen = $_POST['isOpen'];
            echo $id;

            $con = mysqli_connect('localhost', 'root', '', 'quizapp');

            if(mysqli_connect_errno()){
                echo "Failed to connect to database! " . mysqli_connect_error();
            }

            mysqli_query($con, "UPDATE course SET course_name = '$newName', course_description = '$newDesc', course_isopen = $newOpen WHERE course_id = $id");

            mysqli_close($con);

            echo "<script>alert('Course edited!')</script>";
            echo "<script>window.location.href = 'manageCourses.php?edit' </script>";
        }
    ?>
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
						<a class="dropdown-item" href="manageCourses.php?create">Create a course</a>
                        <a class="dropdown-item" href="manageCourses.php?edit">Edit a course</a>
                        <a class="dropdown-item" href="manageCourses.php?view">View courses</a>
					</div>
				</div>
			</li>
            <li class="nav-item">	
				<div class="dropdown">
					<button class="btn btn-outline-dark dropdown-toggle" type="button" id="manageQuizzesDropdown" data-toggle="dropdown">
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
                <a class="btn btn-outline-dark" href="quizTaker.php">Take a quiz</a>
            </li>
		</ul>
	</div>
		
	<form class="form-inline" action="manageCourses.php">
		<input type="hidden" name="form" value="logout">
		<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Logout</button>
	</form>
    </nav>

        <div class="container">
            <?php
                $courseName = $_POST['courseToEdit'];

                echo "<h3>Editing $courseName</h3><hr>";
            ?>

            <form action="editingCourse.php" method="post">
                <div class="form-group">
                    <label for="editName">Course Name</label>
                    <?php
                        echo "<input type=\"text\" class=\"form-control\" id=\"editName\" name=\"editName\" value=\"$courseName\">";
                    ?>
                </div>
                <div class="form-group">
                    <label for="editDesc">Course Description</label>
                    <?php
                        $con = mysqli_connect('localhost', 'root', '', 'quizapp');

                        if(mysqli_connect_errno()){
                            echo "Unable to connect to database! " . mysqli_connect_erorr();
                            die();
                        }

                        $result = mysqli_query($con, "SELECT course_id, course_description, course_isopen FROM course WHERE course_name = \"$courseName\"");

                        $courseId = '';
                        $courseDesc = '';
                        $courseIsOpen = '';
                        
                        while($row = $result->fetch_assoc()){
                            $courseId = $row['course_id'];
                            $courseDesc = $row['course_description'];
                            $courseIsOpen = $row['course_isopen'];
                        }

                        mysqli_close($con);

                        echo "<input type=\"text\" class=\"form-control\" id=\"editDesc\" name=\"editDesc\" value=\"$courseDesc\">";
                    ?>
                </div>
                <div class="form-group">
                    <label for="isOpen">Is this course open?</label> <br>

                    <div class="form-check-inline">
                    <?php
                        if($courseIsOpen == '1'){
                            echo "<input class=\"form-check-input\" type=\"radio\" name=\"isOpen\" id=\"courseIsOpen\" value=\"1\" checked>";
                        }
                        else{
                            echo "<input class=\"form-check-input\" type=\"radio\" name=\"isOpen\" id=\"courseIsOpen\" value=\"1\">";
                        }
                    ?>
                    <label class="form-check-label" for="isOpen">Yes</label>
                    </div>
                    <div class="form-check-inline">
                    <?php
                        if($courseIsOpen == '1'){
                            echo "<input class=\"form-check-input\" type=\"radio\" name=\"isOpen\" id=\"courseNotOpen\" value=\"0\">";
                        }
                        else{
                            echo "<input class=\"form-check-input\" type=\"radio\" name=\"isOpen\" id=\"courseNotOpen\" value=\"0\" checked>";
                        }
                    ?>
                    <label class="form-check-label" for="notOpen">No</label>
                    </div>
                </div>
                <?php
                    echo "<input type=\"hidden\" name=\"edited\" value=\"$courseId\">";
                ?>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-primary" href="manageCourses.php?edit">Go back</a>
            </form>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

</html>
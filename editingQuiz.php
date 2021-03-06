<!DOCTYPE HTML>

<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <title>Editing a quiz...</title>
    </head>

    <body style="background-image: url('pic3.jpg');">
	<?php
        session_start();
        
        if(isset($_POST['markClosed'])){
            $id = $_POST['markClosed'];

            $con = mysqli_connect('localhost', 'root', '', 'quizapp');

            mysqli_query($con, "UPDATE quiz SET is_open = 0 WHERE Quiz_ID = $id");

            mysqli_close($con);
            echo "Quiz closed!";
        }

        if(isset($_POST['markOpen'])){
            $id = $_POST['markOpen'];

            $con = mysqli_connect('localhost', 'root', '', 'quizapp');

            mysqli_query($con, "UPDATE quiz SET is_open = 1 WHERE Quiz_ID = $id");

            mysqli_close($con);
            echo "Quiz opened!";
        }
	?>
    <body>
    <?php
        if(isset($_POST['edited'])){
            if(empty($_POST['editName'])){
                echo "<script>alert('No quiz name entered!')</script>";
                echo "<script>window.location.href = 'manageQuizzes.php?edit' </script>";
            }

            if(empty($_POST['editDesc'])){
                echo "<script>alert('No quiz description entered!')</script>";
                echo "<script>window.location.href = 'manageQuizzes.php?edit' </script>";
            }

            if(empty($_POST['editPass'])){
                echo "<script>alert('No passing score entered!')</script>";
                echo "<script>window.location.href = 'manageQuizzes.php?edit' </script>";
            }

            $id = $_POST['edited'];
            $newName = $_POST['editName'];
            $newDesc = $_POST['editDesc'];
            $newDiff = $_POST['editDiff'];
            $newPass = $_POST['editPass'];

            $con = mysqli_connect('localhost', 'root', '', 'quizapp');

            if(mysqli_connect_errno()){
                echo "Failed to connect to database! " . mysqli_connect_error();
            }

            mysqli_query($con, "UPDATE quiz SET quiz_name = '$newName', quiz_description = '$newDesc', quiz_difficulty = '$newDiff', quiz_passingscore = '$newPass' WHERE quiz_id = $id");

            mysqli_close($con);

            echo "<script>alert('Quiz edited!')</script>";
            echo "<script>window.location.href = 'manageQuizzes.php?edit' </script>";
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="welcome.php" style="text-shadow: 2px 2px 8px #000000;">Quiz App</a>
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
			<p class="loggedIn">Logged in as <?php echo ("{$_SESSION['username']}"." ");  ?> </p>
	</li>	
	<form class="form-inline" action="editingCourse.php" method="post">
		<input type="hidden" name="form" value="logout" style="color:white; text-shadow: 2px 2px 8px #000000;">
		<button class="btn btn-dark my-2 my-sm-0" type="submit">Logout</button>
	</form>
    </nav>

        <div class="container editingCourse">
            <?php
                $quizName = $_POST['quizToEdit'];

                echo "<h3 style='font-weight:bolder; text-shadow: 4px 4px 8px #000000;'>Editing $quizName</h3><hr>";
            ?>
			<hr class="new1">
            <form action="editingQuiz.php" method="post">
                <div class="form-group">
                    <label for="editName" style="font-weight:bolder; text-shadow: 4px 4px 8px #000000;">Quiz Name</label>
                    <?php
                        echo "<input type=\"text\" class=\"form-control\" id=\"editName\" name=\"editName\" value=\"$quizName\">";
                    ?>
                </div>
                <div class="form-group">
                    <label for="editDesc" style="font-weight:bolder; text-shadow: 4px 4px 8px #000000;">Quiz Description</label>
                    <?php
                        $con = mysqli_connect('localhost', 'root', '', 'quizapp');

                        if(mysqli_connect_errno()){
                            echo "Unable to connect to database! " . mysqli_connect_erorr();
                            die();
                        }

                        $result = mysqli_query($con, "SELECT quiz_id, quiz_description, quiz_difficulty, quiz_passingscore, quiz_type, is_open FROM quiz WHERE quiz_name = \"$quizName\"");

                        $quizId = '';
                        $quizDesc = '';
                        $quizDiff = '';
                        $quizPass = '';
                        $quizType = '';
                        $isOpen = '';

                        while($row = $result->fetch_assoc()){
                            $quizId = $row['quiz_id'];
                            $quizDesc = $row['quiz_description'];
                            $quizDiff = $row['quiz_difficulty'];
                            $quizPass = $row['quiz_passingscore'];
                            $quizType = $row['quiz_type'];
                            $isOpen = $row['is_open'];
                        }

                        mysqli_close($con);

                        echo "<input type=\"text\" class=\"form-control\" id=\"editDesc\" name=\"editDesc\" value=\"$quizDesc\">";
                    ?>
                </div>

                <div class="form-group">
                    <label for="editDiff">Quiz Difficulty</label>
                    <select class="custom-select" name="editDiff" id="editDiff">

                    <?php
                        if($quizDiff == 'easy'){
                            echo "<option value=\"EASY\" selected>Easy</option>";
                            echo "<option value=\"MEDIUM\">Medium</option>";
                            echo "<option value=\"HARD\">Hard</option>";
                        }  
                        else if($quizDiff == 'medium'){
                            echo "<option value=\"EASY\">Easy</option>";
                            echo "<option value=\"MEDIUM\" selected>Medium</option>";
                            echo "<option value=\"HARD\">Hard</option>";
                        }
                        else{
                            echo "<option value=\"EASY\" selected>Easy</option>";
                            echo "<option value=\"MEDIUM\">Medium</option>";
                            echo "<option value=\"HARD\" selected>Hard</option>";
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="editPass">Passing Score</label>
                    <?php
                    echo "<input type=\"number\" class=\"form-control\" id=\"editPass\" name=\"editPass\" value=\"$quizPass\">";
                    ?>
                </div>
                
                <?php
                    echo "<input type=\"hidden\" name=\"edited\" value=\"$quizId\">";
                ?>
                
                <!-- <?php
                    //echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"addQuestion('$quizType')\">Add a question</button>";
                ?> -->
				
                <button type="button" class="btn btn-primary" onclick="addTag()">Add a tag</button>
                
                <?php
                //var_dump($isOpen);
                    if($isOpen == '1'){
                        echo "<button id=\"$quizId\" type=\"button\" class=\"btn btn-primary markClosed\">Mark as Closed</button>";
                    }
                    else{
                        echo "<button id=\"$quizId\" type=\"button\" class=\"btn btn-primary markOpen\">Mark as Open</button>";
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
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-primary" href="manageQuizzes.php?edit">Go back</a>
            </form>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="editingQuiz.js"></script>
    </body>

</html>
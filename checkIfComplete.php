<?php
        session_start();

        if(isset($_POST['totalTaken'])){
            $totalTaken = $_POST['totalTaken'];
            $totalQuizzes = $_POST['totalQuizzes'];
            $courseId = $_POST['courseId'];

            if($totalTaken == 0 && $totalQuizzes == 0){
                echo "There are no quizzes yet in this course!";
                die();
            }
            else if($totalTaken == $totalQuizzes){
                $con = mysqli_connect('localhost', 'root', '', 'quizapp');
                
                mysqli_query($con, "UPDATE course_log SET course_complete = 1 WHERE course_id = $courseId");
                
                echo "Course completed! Congratulations!";
                die();
            }
            else{
                echo "You have not accomplished all the quizzes in this course!";
                die();
            }
        }
	?>
$(document).ready(function(){
    $('.viewCourseButton').on('click', function(){
        $id = $(this).closest('tr').attr('id');
        window.location.replace('viewCourseStats.php?index=' + $id);
    }); 

    $('.viewQuizButton').on('click', function(){
        $id = $(this).closest('tr').attr('id');
        window.location.replace('viewQuizStats.php?index=' + $id);
    }); 

    $('.goBackQuiz').on('click', function(){
        window.location.replace('manageQuizzes.php');
    });

    $('.goBackCourse').on('click', function(){
        window.location.replace('manageCourses.php');
    });
});
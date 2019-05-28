$(document).ready(function(){
    $('.completeCourse').on('click', function(){
        $totalTaken = $(this).closest('tr').find('.totalTaken').text();
        $totalQuizzes = $(this).closest('tr').find('.totalQuizzes').text();
        $courseId = $(this).closest('tr').attr('id');

        $.ajax({
            url: 'checkIfComplete.php',
            type: 'POST',
            data: {'totalTaken': $totalTaken, 'totalQuizzes': $totalQuizzes, 'courseId': $courseId},
            success: function(result){
                alert(result);
                window.location.replace('welcome.php');
            }
        });
    });

    $('.goBackCourseList').on('click', function(){
        window.location.replace('manageCourses.php');
    });
});
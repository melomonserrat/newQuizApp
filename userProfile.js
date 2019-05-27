$(document).ready(function(){
    $('.quizHistory').hide();
    $('.courseHistory').hide();

    $('#viewQuizHistory').click(function(){
        $('.profileHome').hide(1000);
        $('.quizHistory').show(1000);
        $('.courseHistory').hide();
    });

    $('#viewCourseHistory').click(function(){
        $('.profileHome').hide(1000);
        $('.quizHistory').hide();
        $('.courseHistory').show(1000);
    });

    $('.goToHome').click(function(){
        $('.quizHistory').hide();
        $('.courseHistory').hide();
        $('.profileHome').show(1000);
    });

});
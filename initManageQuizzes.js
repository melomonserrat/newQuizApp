$(document).ready(function(){
    $('.home, #createQuiz, #editQuizzes, #viewQuizzes').hide();

    if(window.location.href.indexOf("create") > -1){
        $('#createQuiz').show(1000);
    }
    else if(window.location.href.indexOf("edit") > -1){
        $('#editQuizzes').show(1000);
    }
    else if(window.location.href.indexOf("view") > -1){
        $('#viewQuizzes').show(1000);
    }
    else{
        $('.home').show(1000);
    } 
})
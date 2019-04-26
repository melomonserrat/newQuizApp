$(document).ready(function(){
    $('.home, .createCourse, .editCourse, .viewCourses').hide();

    if(window.location.href.indexOf("create") > -1){
        $('.createCourse').show(1000);
    }
    else if(window.location.href.indexOf("edit") > -1){
        $('.editCourse').show(1000);
    }
    else if(window.location.href.indexOf("view") > -1){
        $('.viewCourses').show(1000);
    }
    else{
        $('.home').show(1000);
    }
})
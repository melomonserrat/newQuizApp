function createCourse(){
    if($('.home').is(':visible')){
        $('.home').hide(1000);
    }
    if($('.editCourse').is(':visible')){
        $('.editCourse').hide(1000);
    }
    if($('.viewCourses').is(':visible')){
        $('.viewCourses').hide(1000);
    }
    if($('.createCourse').is(':hidden')){
        $('.createCourse').show(1000);
    }
}

function editCourse(){
    if($('.home').is(':visible')){
        $('.home').hide(1000);
    }
    if($('.editCourse').is(':hidden')){
        $('.editCourse').show(1000);
    }
    if($('.viewCourses').is(':visible')){
        $('.viewCourses').hide(1000);
    }
    if($('.createCourse').is(':visible')){
        $('.createCourse').hide(1000);
    }
}

function viewCourses(){
    if($('.home').is(':visible')){
        $('.home').hide(1000);
    }
    if($('.editCourse').is(':visible')){
        $('.editCourse').hide(1000);
    }
    if($('.viewCourses').is(':hidden')){
        $('.viewCourses').show(1000);
    }
    if($('.createCourse').is(':visible')){
        $('.createCourse').hide(1000);
    }
}

function goBackToHome(){
    if($('.home').is(':hidden')){
        $('.home').show(1000);
    }
    if($('.editCourse').is(':visible')){
        $('.editCourse').hide(1000);
    }
    if($('.viewCourses').is(':visible')){
        $('.viewCourses').hide(1000);
    }
    if($('.createCourse').is(':visible')){
        $('.createCourse').hide(1000);
    }
}


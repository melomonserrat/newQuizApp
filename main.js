$(document).ready(function(){
    $('.loginCredentials').hide();
    $('.signup').hide();
})

function login(){
    $('.homePageButtons').hide(1000);
    $('.loginCredentials').show(1000);
}

function signup(){
    $('.homePageButtons').hide(1000);
    $('.signup').show(1000);
}

function goBackToHome(){
    $('.homePageButtons').show(1000);

    if(!$('.loginCredentials').is(':hidden')){
        $('.loginCredentials').hide(1000);
    }
    else{
        $('.signup').hide(1000);
    }
    
}
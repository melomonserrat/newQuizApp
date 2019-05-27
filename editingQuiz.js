$(document).ready(function(){
    $('.markClosed').on('click', function(){
        let toClose = $(this).attr('id');

        $.ajax({
            url: 'editingQuiz.php',
            type: 'POST',
            data: {'markClosed': toClose},
            success: function(result){
                alert('Quiz closed!');
                window.location.replace('welcome.php');
            }
        });
    });

    $('.markOpen').click('click', function(){
        let toOpen = $(this).attr('id');

        $.ajax({
            url: 'editingQuiz.php',
            type: 'POST',
            data: {'markOpen': toOpen},
            success: function(result){
                alert('Quiz opened!');
                window.location.replace('welcome.php');
            }
        });
    });
})
$(document).ready(function(){
    $('.markClosed').click(function(){
        let toClose = this.id;

        $.ajax({
            url: 'editingQuiz.php',
            type: 'POST',
            data: {'markClosed': toClose},
            success: function(result){
                alert(result);
                window.location = 'welcome.php';
            }
        });
    })
})
$(document).ready(function() {
    
    $('.subMenu').click(function(){
        $("#booktablediv").slideDown();
        $("#usertablediv").slideDown();

        
    });
    $('#managebook').click(function(){
        $("#booktablediv").slideDown();
        $("#usertablediv").slideUp();    
    });
    $('#manageuser').click(function(){
        $("#booktablediv").slideUp();
        $("#usertablediv").slideDown(); 
    });

});
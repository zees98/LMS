$(document).ready(function() {
    $("#newarrivals").slideUp();
    $("#maylike").slideUp();
});

$(document).ready(function() {
    $("#arrow1").click(function(e) {

        $("#newarrivals").slideToggle();

    });
});


$(document).ready(function() {
    $("#arrow2").click(function(e) {

        $("#maylike").slideToggle();

    });
});
$(document).ready(function() {


    $("#return").click(function(e) {
        //Show and hide alert box
        $("#dlgbx").fadeIn();
    });

    $("#confirm").click(function(e) {
        $("#dlgbx h1").text(
            "Success"
        );

    });
    $("#cancel").click(function(e) {
        $("#dlgbx").fadeOut();

    });
});
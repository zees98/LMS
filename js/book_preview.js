// Arrow button behaviour

$(document).ready(function() {
    $("#expand").click(function(e) {

        $("#description").slideToggle();

    });

    $("#issueBtn").click(function(e) {
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


// var rating   = "3" ++ "4";
// alert(rating + "");
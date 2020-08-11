$(document).ready(function() {



    $("#click").click(function(e) {
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




    $("#click").click(function(e) {
        var memb_name = $("#name").val();
        var memb_email = $("#email").val();
        var memb_message = $("#message").val();
        var addRequest = new XMLHttpRequest();
        addRequest.open("POST", "../php/feedback.php", true);
        addRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        alert("Thanks for your feedback!!")
        addRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(addRequest.responseText);

            } else {
                alert("failed");
            }
        }
        addRequest.send(
            "Membername=" + memb_name + "&" +
            "Email=" + memb_email + "&" +
            "Message=" + memb_message
        );


    });

});
$(document).ready(function() {

    $("#forgot").click(function(e) {
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

    $("#mem-login").click(function(e) {
        window.location = "../../html/logIn.html";
    });

    $("#login-btn").click(function(e) {
        e.preventDefault();
        $("#login-btn").hide();
        $('#or').hide();
        $('#b').hide();
        $("#custom-form").append("<div class='spinner mx-auto'></div>");

        var username = $("#email").val();
        var password = $("#password").val();

        $.post("../../php/admin/adminlogin.php", {
            username: username,
            password: password,
        }).done(function(data) {
            console.log(data);
            if (data == "success")
                window.location = "../../html/admin/dashboard.php";
            else {
                $("#login-btn").show();
                $('#or').show();
                $('#b').show();
                $(".spinner").hide();
            }
        });




    });



});
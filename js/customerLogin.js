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


    $("#login-btn").click(function(e) {
        e.preventDefault();
        $("#login-btn").hide();
        $("#formDiv").append("<div class='spinner mx-auto'></div>");

        var username = $("#email").val();
        var password = $("#password").val();
        alert(username);
        alert(password);
        $.post("../php/customerLogin.php", {
            username: username,
            password: password,
        }).done(function(data) {
            console.log(data);
            if (data == "success")
                window.location = "../html/dashboard.php";
            else {
                alert(data);
                alert("Account Doesnt exit");
                $("#login-btn").show();
                $(".spinner").hide();
                alert(data);
            }
        });
    });

});
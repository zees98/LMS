$(document).ready(function() {

    $("#login-btn").click(function(e) {
        e.preventDefault();
        $("#login-btn").hide();
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
                $(".spinner").hide();
            }
        });




    });



});
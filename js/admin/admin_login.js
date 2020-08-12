$(document).ready(function() {
    const forget_email=document.querySelector('#forgetemail');
    const new_password=document.querySelector('#forgetpassword');

    $("#forgot").click(function(e) {
        //Show and hide alert box
        $("#dlgbx").fadeIn();
    });

    $("#confirm").click(function(e) {
        $("#dlgbx h1").text( 
            "Success"
        );
        SendData();
        

    });
    $("#cancel").click(function(e) {
        $("#dlgbx").fadeOut();

    });

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

    function SendData(){
        if(new_password.value==="" || forget_email.value===""){
            alert("Please Enter Data!");
        }
        else{
        if(new_password.value.length>=8){
        new_password.style.cssText="border-color:transparent";
        var req = new XMLHttpRequest();
        req.open("POST",'../../php/admin/forgetpassword.php',true); 
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                $("#dlgbx").fadeOut();
                console.log("success!");
            } else {
                console.log("failed");
            } 
        }
        req.send("email="+forget_email.value.toLowerCase()+ "&" +
        "password=" + new_password.value.toLowerCase()
        );
    }
    else{
        alert("Password must be atleast 8 characters long!");
        new_password.style.cssText="border-color:red";
    }
}
    }



});
$("#dashboard").click(function(e) {
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function() {
            window.location = target;
        }, 350);
    }
});

$("#issuedbooks").click(function(e) {
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function() {
            window.location = target;
        }, 350);
    }
});

$("#customerprofile").click(function(e) {
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function() {
            window.location = target;
        }, 350);
    }
});


$("#history").click(function(e) {
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function() {
            window.location = target;
        }, 350);
    }
});

$("#pastdue").click(function(e) {
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function() {
            window.location = target;
        }, 350);
    }
});

$(document).ready(function() {

    $("#filter").click(function(e) {
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
$(document).ready(function() {
    $("#newarrivals").slideUp("fast");
    $("#maylike").slideUp("fast");
});

$(document).ready(function() {

    $("#arrow1").click(function(e) {
        document.getElementById("showmore").innerHTML = "See More";
        $("#newarrivals").slideToggle(1000);

    });
    $("#arrow2").click(function(e) {

        $("#maylike").slideToggle(1000);

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
});

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
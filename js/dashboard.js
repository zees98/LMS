$(document).ready(function() {
    $("#newarrivals").slideUp("slow");
    $("#maylike").slideUp("slow");
});

$(document).ready(function() {
    $("#arrow1").click(function(e) {

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
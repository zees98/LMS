$(document).ready(function() {
    $("#newarrivals").slideUp("fast");
    $("#maylike").slideUp("fast");


    var req = new XMLHttpRequest();
    var method = "GET";
    var url = "../php/dashboarddata.php";
    var async = true;
    req.open(method, url, async);

    req.send();

    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            var data = JSON.parse(this.responseText);
            var pastdue = data[0].totalPastDue;
            var totalIssued = data[0].totalIssued;
            var totalReturn = data[0].totalReturn;


            document.querySelector('#totalIssued').innerHTML = totalIssued;
            document.querySelector('#totalPastdue').innerHTML = pastdue;
            document.querySelector('#totalReturned').innerHTML = totalReturn;
        }
    }

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

});
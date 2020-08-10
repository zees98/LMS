$(document).ready(function() {
    console.log("hello");
    var books = document.querySelector('#totalIssued');
    console.log($('#totalIssued').innerText);
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

            // alert(this.responseText);
            var data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data.length);
            for (var a = 0; a < data.length; a++) {
                console.log(a);
                var count = data[a].title;
                var publisher = data[a].name;
                var cat_name = data[a].cat_name;
                var issue_date = data[a].due_date;
                var return_date = data[a].return_date;

                var row = generateHTMLRow(
                    data[a].title,
                    data[a].cat_name,
                    data[a].name,
                    data[a].due_date,
                    data[a].return_date,

                );
                console.log(row);
                $(".spinner").fadeOut();
                $("#tablebody").append(row);

            }
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
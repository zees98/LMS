$(document).ready(function() {


    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../html/data.php";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);

    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readystate == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var html = "";
            for (var a = 0; a < data.length; a++) {
                var Name = data[a].title;
                var Name = data[a].pub_year;

                html += "<tr>";
                html += "<td>" + Name + "<td>";
                html += "<tr>";

                document.getElementById("tablebody").innerHTML = html;
            }
        }
    }

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
});
$(document).ready(function() {


    function generateHTMLRow(...args) {
        var a = 1;
        var row = "<tr>";
        row += "<td>" + ++a + "</td>"
        for (var i = 0; i < args.length; i++) {
            row += "<td>" + args[i] + "</td>"
        }
        row += getTableButtons();
        row += "</tr>";
        // alert(row);
        return row;
    }

    function getTableButtons() {
        return '<td><div class="row"><button id="hide"> <a><p id="view">View</p></a></button><button id="hide" style=" position: relative;left:20px;"><p id="return">return</p></button></div></td>'
    }

    var req = new XMLHttpRequest();
    var method = "GET";
    var url = "../html/data.php";
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
                var title = data[a].title;
                var publisher = data[a].name;
                var cat_name = data[a].cat_name;
                var issue_date = data[a].due_date;
                var row = generateHTMLRow(
                    data[a].title,
                    data[a].cat_name,
                    data[a].name,
                    data[a].due_date,
                );
                console.log(row);
                $(".spinner").fadeOut();
                $("#tablebody").append(row);

            }
            var total = data.length;
            document.getElementById("total").innerHTML = total;



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
$(document).ready(function() {

    function generateHTMLRow(...args) {
        var row = document.createElement("tr");

        for (var i = 0; i < args.length; i++) {
            var td = document.createElement("td");
            td.innerText = args[i];
            row.appendChild(td);
        }
        row.appendChild(Button(args[0]));
        return row;
    }


    function ViewBook(user_id) {
        var request = new XMLHttpRequest();
        request.open("POST", "../php/view.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onreadystatechange = function(e) {
            if (this.readyState == 4 && this.status == 200) {}
        }
        request.send("id=" + user_id);
    }

    function Button(id) {
        var view = document.createElement("p");
        view.id = "view";
        view.appendChild(document.createTextNode("View"));
        var l = document.createElement("a");
        l.setAttribute("href", "../html/viewBooks.php");
        l.appendChild(view);
        var viewbutton = document.createElement("button");
        viewbutton.id = "hide";
        viewbutton.style.top = '15px';
        viewbutton.appendChild(l);
        var r = document.createElement("div");
        r.classList.add("row");
        r.appendChild(viewbutton);
        viewbutton.addEventListener("click", function(e) {
            ViewBook(id);
        });
        return r;;
    }

    var req = new XMLHttpRequest();
    var method = "GET";
    var url = "../php/lateBooks.php";
    var async = true;
    req.open(method, url, async);

    req.send();

    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data.length);
            for (var a = 0; a < data.length; a++) {
                console.log(a);
                var id = data[a].book_id;
                var title = data[a].title;
                var publisher = data[a].name;
                var cat_name = data[a].cat_name;
                var issue_date = data[a].issue_date;
                var due_date = data[a].due_date;
                var return_date = data[a].return_date;

                var row = generateHTMLRow(
                    id,
                    data[a].title,
                    data[a].cat_name,
                    data[a].name,
                    data[a].issue_date,
                    data[a].due_date,
                    data[a].return_date,

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
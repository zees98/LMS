// Arrow button behaviour

$(document).ready(function() {
    $("#expand").click(function(e) {

        $("#description").slideToggle();

    });

    $("#issueBtn").click(function(e) {
        //Show and hide alert box
        $("#dlgbx").fadeIn();
        GetBookDetails();

    });

    $("#confirm").click(function(e) {
        $("#dlgbx h1").text(
            "Success"
        );
        $("#dlgbx").fadeOut();
        InsertIssuedBook();


    });
    $("#cancel").click(function(e) {
        $("#dlgbx").fadeOut();

    });




    function GetDate() {
        var CurrentDate = new Date();
        var days = 10;
        var dd = CurrentDate.getDate() + days;
        var mm = CurrentDate.getMonth() + 1;
        var y = CurrentDate.getFullYear();
        var FormattedDate = y + '/' + mm + '/' + dd;
        return FormattedDate;
    }



    function generateHTMLRow(...args) {
        var row = "<tr>";
        for (var i = 0; i < args.length; i++) {
            row += "<td>" + args[i] + "</td>"
        }
        row += "</tr>";
        return row;
    }

    function GetBookDetails() {
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = '../php/issuebook.php';
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
                    var author = data[a].author;
                    var date = GetDate();

                    var row = generateHTMLRow(
                        title, author, date
                    );
                    //console.log(row); 
                    $("#issue-book-body").append(row);
                }
            }
        }
    }

    function InsertIssuedBook() {
        var req = new XMLHttpRequest();
        req.open("POST", '../php/insertissuedbook.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                console.log("success!");
            } else {
                console.log("failed");
            }
        }
        req.send("duedate=" + GetDate());
    }

});
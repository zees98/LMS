$(document).ready(function() {

    $("#dlgbx").hide();

    //Refresh the books table 
    $("#refresh").click(function(e) {
        getBooks();
        alert("Refresh Done");

    });

    formHide_Show();
    getBooks();
    addBooks();



});

function addBooks() {



    $("#submit").click(function(e) {
        var book_title = $("#book_title").val();
        var book_author = $("#book_author").val();
        var book_date = $("#book_date").val();
        var category = $("#category").val();
        var summary = $("#summary").val();
        var pub_name = $("#pub-name").val();
        var pub_address = $("#pub_address").val();
        alert(book_title + " " + book_author + " " + book_date + " " + category + " " + summary + " " + pub_name + " " + pub_address);


        var addRequest = new XMLHttpRequest();
        addRequest.open("POST", "../../php/admin/add_book.php", true);
        addRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        addRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                getBooks();


            }
        }

        addRequest.send(
            "bookname=" + book_title + "&" +
            "bookAuthor=" + book_author + "&" +
            "date=" + book_date + "&" +
            "category=" + category + "&" +
            "summary=" + summary + "&" +
            "pub_name=" + pub_name + "&" +
            "pub_address=" + pub_address
        );
    });

}




function formHide_Show() {
    $("#addbutton").click(function(e) {
        // alert("Hi");

        $('#dlgbx').slideDown();
        $("#dlgbxBody").fadeIn();
    });
    $("#submit").click(function(e) {
        // alert("Hi");

        $('#dlgbx').slideDown();
        $("#dlgbxBody").fadeIn();
    });

    $("#cancel").click(function(e) {

        $("#dlgbxBody").fadeOut();
        $("#dlgbx").slideUp();



    });

}

function generateHTMLRow(...args) {
    var row = "<tr>";
    for (var i = 0; i < args.length; i++) {
        row += "<td>" + args[i] + "</td>"
    }
    row += getTableButtons();
    row += "</tr>";
    // alert(row);
    return row;
}


function getTableButtons() {
    return '<td><button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button><button class="btn"><i class="fa fa-circle-o-notch" aria-hidden="true" id="update"></i></button></td>'
}

function getBooks() {
    var req = new XMLHttpRequest();
    var method = "GET";
    var url = "../../php/admin/manage_books.php";
    var async = true;


    req.open(method, url, async);


    req.send();

    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var trs;
            // alert(this.responseText);
            var data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data.length);
            for (var a = 0; a < data.length; a++) {
                console.log(a);
                var book_id = data[a].book_id;
                var title = data[a].title;
                var pub_year = data[a].pub_year;
                var author = data[a].author;
                var cat_name = data[a].cat_name;

                var row = generateHTMLRow(
                    data[a].book_id,
                    data[a].title,
                    data[a].pub_year,
                    data[a].author,
                    data[a].cat_name
                );
                console.log(row);

                trs += row;

            }
            $(".spinner").fadeOut();
            $("#manage-books-table-body").html(trs);



        }
    }
}
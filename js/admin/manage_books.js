$(document).ready(function() {

    $("#dlgbx").hide();



    $("#addbutton").click(function(e) {
        // alert("Hi");

        $('#dlgbx').slideDown();
        $("#dlgbxBody").fadeIn();
    });
    getBooks();

    $("#cancel").click(function(e) {

        $("#dlgbxBody").fadeOut();
        $("#dlgbx").slideUp();



    });



});

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
    return '<td>  <button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button><button class="btn"><i class="fa fa-circle-o-notch" aria-hidden="true" id="update"></i></button></td>'
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
                $(".spinner").fadeOut();
                $("#manage-books-table-body").append(row);

            }



        }
    }
}
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

<<<<<<< HEAD


    $("#book-form").submit(function(e) {
        e.preventDefault();
=======
    $("#submit").click(function(e) {
>>>>>>> 670db9694206d6690defd4fe592bb9da70a76ac9
        var book_title = $("#book_title").val();
        var book_author = $("#book_author").val();
        var book_date = $("#book_date").val();
        var category = $("#category").val();
        var summary = $("#summary").val();
        var pub_name = $("#pub-name").val();
        var pub_address = $("#pub_address").val();
<<<<<<< HEAD
        // alert(book_title + " " + book_author + " " + book_date + " " + category + " " + summary + " " + pub_name + " " + pub_address);

        // if (!isNullOrEmpty(book_title, book_author, book_date, category, summary, pub_name, pub_address)) {
=======
        alert(book_title + " " + book_author + " " + book_date + " " + category + " " + summary + " " + pub_name + " " + pub_address);
>>>>>>> 670db9694206d6690defd4fe592bb9da70a76ac9
        var addRequest = new XMLHttpRequest();
        addRequest.open("POST", "../../php/admin/add_book.php", true);
        addRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        addRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // alert(this.responseText);
                $("#dlgbxBody").fadeOut();
                $("#dlgbx").slideUp();

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


function isNullOrEmpty(...vals) {
    var res = vals.contains("") || vals.contains(null);
    alert(res)
    return res;
}

function formHide_Show() {
    $("#addbutton").click(function(e) {
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
    var row = document.createElement("tr");

    for (var i = 0; i < args.length; i++) {
        var td = document.createElement("td");
        td.innerText = args[i];
        row.appendChild(td);
    }




    row.appendChild(createDelButton(args[0]));
    // alert(row);
    return row;
}

function delBook(id) {

    if (confirm("Delete Book " + id + "?")) {

        var delRequest = new XMLHttpRequest();
        delRequest.open("POST", "../../php/admin/delete_book.php", true);
        delRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        delRequest.onreadystatechange = function(e) {
            if (this.readyState == 4 && this.status == 200) {
                alert("Book " + id + ":" + "Deleted");
                getBooks();
            }
        }

        delRequest.send("book_id=" + id);
    }

}




function createDelButton(id) {
    var delButton = document.createElement("BUTTON");
    delButton.addEventListener("click", function(e) {
        delBook(id);
    });
    delButton.classList.add("btn", "btn-primary", "");
    var trashIcon = document.createElement("i");
    trashIcon.classList.add("fa", "fa-trash");

    delButton.appendChild(trashIcon);
    return delButton;
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
            $("#booktable tbody").remove();
            var tbody = document.createElement("tbody");
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

                tbody.appendChild(row);

            }
            $(".spinner").fadeOut();
            $("#booktable").append(tbody);



        }
    }
}
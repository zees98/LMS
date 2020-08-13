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

$(document).ready(function() {
    $(".suggestions").hide();


    $("#filter").click(function(e) {
        //Show and hide alert box
        $("#dlgbx").fadeIn();
    });

    $("#confirm").click(function(e) {
        $("#dlgbx h1").text(
            "Success"
        );

    });
    $("#cancel").click(function(e) {
        $("#dlgbx").fadeOut();

    });



    var textfield = $("#searchbar");
    textfield.on("click", function(e) {
        // alert("Helloo");
        $("#search-container").toggleClass("focus-border");
    });
    textfield.on("input", function(e) {
        // var suggestion = new XMLHttpRequest();
        // suggestion.open()
        var text = textfield.val();


        var list = document.getElementById("suggestions");
        var suggestbox = new XMLHttpRequest();
        suggestbox.open("POST", "../php/autcomp.php", true);
        suggestbox.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        suggestbox.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                console.log(this.responseText)
                var comp_data = JSON.parse(this.responseText);
                if (comp_data.length > 0) {


                    textfield.on("change", function(e) {

                        $("#searchedBooks").empty();
                        var resultsPage = document.getElementById("searchedBooks");


                        var rowEl = document.createElement("div");
                        rowEl.classList.add("row");

                        for (row in comp_data) {
                            rowEl.appendChild(createBookcards(
                                comp_data[row].book_id,
                                comp_data[row].title,
                                comp_data[row].author,
                                comp_data[row].rating
                            ));
                        }
                        resultsPage.appendChild(rowEl);



                    });





                    $(".suggestions").empty();
                    console.log(this.responseText);
                    var comp_data = JSON.parse(this.responseText);
                    console.log(comp_data);
                    comp_data
                    for (row in comp_data) {
                        var div = document.createElement("DIV");
                        div.innerText = comp_data[row].title;
                        list.appendChild(div);
                        div.addEventListener("click", function(e) {
                            setBookIDSession(comp_data[row].book_id)
                        });

                    }
                    $(".suggestions").slideDown();
                } else {
                    $(".suggestions").slideUp();
                }
            }
        }
        suggestbox.send("string=" + text);




    });






});

function setBookIDSession(id) {
    var bookIDSessionReq = new XMLHttpRequest();
    bookIDSessionReq.open("post", "../php/view.php", true);
    bookIDSessionReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    bookIDSessionReq.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location = "../html/viewBooks.php";
        }
    }
    bookIDSessionReq.send("id=" + id);

}

function createBookcards(id, bookname, author, rating) {
    var col = document.createElement("div");
    col.classList.add("col-lg-4", "col-md-6", "mb-5");

    var card = document.createElement("DIV");
    card.classList.add("card");
    card.style.width = "18rem";

    var img = document.createElement("img");
    img.classList.add("card-img-top");

    img.setAttribute("src", "../assets/books/2.jpg");
    img.setAttribute("alt", "No Images");

    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    var h4 = document.createElement("h4");
    h4.innerText = bookname;
    h4.classList.add("card-text");
    var h5 = document.createElement("h5");
    h5.innerText = author;
    h5.classList.add("card-text");

    var h6 = document.createElement("h6");
    h6.innerText = "⭐".repeat(rating);
    h6.classList.add("card-text");

    col.appendChild(card);
    card.appendChild(img);
    card.appendChild(cardBody);

    cardBody.appendChild(h4);
    cardBody.appendChild(h5);
    cardBody.appendChild(h6);

    col.addEventListener("click", function(e) {

        setBookIDSession(id);

    });

    return col;
}
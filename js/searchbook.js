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
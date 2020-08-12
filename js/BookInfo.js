$(document).ready(function() {

    var loadReviews = new XMLHttpRequest();
    loadReviews.open(
        "POST",
        "../php/view.php",
        true
    );

    loadReviews.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    loadReviews.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var jsonDecode = JSON.parse(this.responseText);
            var reviews = document.querySelector("#reviews .container-fluid");
            for (row in jsonDecode) {
                var name = jsonDecode[row].firstname;
                var rating = jsonDecode[row].rating;
                var review = jsonDecode[row].review_text;
                var date = jsonDecode[row].date;


                reviews.appendChild(reviewItem(name, rating, review, date));
                $("#reviews .container-fluid").append("<hr>");
            }


        }
    }
    loadReviews.send("review=true");

    $("#search").click(function(e) {
        var message = $("#message").val();
        var rating = $("#rating option:selected").text();
        var addRequest = new XMLHttpRequest();
        addRequest.open("POST", "../php/giveReview.php", true);
        addRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        location.reload();
        addRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Thanks for your feedback!!");
            }
        }
        addRequest.send(
            "message=" + message + "&" +
            "rating=" + rating
        );

    });


});


function reviewItem(name, rating, review, date) {
    var createRow = document.createElement("ROW");
    createRow.classList.add("row")
        // Preparing the first column
    var createCol1 = document.createElement("DIV");
    createCol1.classList.add("col-1");
    var createImg = document.createElement("IMG");
    createImg.setAttribute("src", "../assets/Icons/book.png");
    createImg.setAttribute("width", "100%");

    createCol1.appendChild(createImg);


    var createCol11 = document.createElement("DIV");
    createCol11.classList.add("col-11", "m-auto");


    var createH5 = document.createElement("H5");
    createH5.classList.add("text-info");
    createH5.append(name + " " + "⭐".repeat(rating))

    var createH6 = document.createElement("H6");
    createH6.append(review + " - " + date);

    createCol11.appendChild(createH5);
    createCol11.appendChild(createH6);

    createRow.appendChild(createCol1);
    createRow.appendChild(createCol11);
    return createRow;


}
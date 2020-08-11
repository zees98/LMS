// validateForm();
// $("#click").click(function(e) {
//     var x = document.getElementById("yourname").val()
//     alert(x);

// });



// function validateForm() {
//     var x = document.getElementById("yourname").val()
//     alert(x);
//     if (x == "") {
//         alert("Name must be filled out");
//         return false;
//     }
// }

$("#click").click(function(e) {
    var memb_name = $("#name").val();
    var memb_email = $("#email").val();
    var memb_message = $("#message").val();
    var addRequest = new XMLHttpRequest();
    addRequest.open("POST", "../php/feedback.php", true);
    addRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    addRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


        }
    }

    addRequest.send(
        "Membername=" + memb_name + "&" +
        "Email=" + memb_email + "&" +
        "Message=" + memb_message
    );
});
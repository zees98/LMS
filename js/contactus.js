$(document).ready(function() {


    validateForm();
    $("#click").click(function(e) {
        var x = document.getElementById("yourname").val()
        alert(x);

    });



    function validateForm() {
        var x = document.getElementById("yourname").val()
        alert(x);
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
    }
});
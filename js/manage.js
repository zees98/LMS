$(document).ready(function() {

    $('.subMenu').click(function() {
        $("#booktablediv").slideDown();
        $("#usertablediv").slideDown();


    });
    $('#managebook').click(function() {
        $("#booktablediv").slideDown();
        $("#usertablediv").slideUp();
    });
    $('#manageuser').click(function() {
        $("#booktablediv").slideUp();
        $("#usertablediv").slideDown();
    });

    const file = document.querySelector('#file');
    const img = document.querySelector('#image');
    const cameraicon = document.querySelector('#camera-icon');

    var div = document.createElement("div");
    var deletebutton = document.createElement("button");
    var trashicon = document.createElement("i");
    deletebutton.className="btn";
    trashicon.id="trash";
    trashicon.className="fa fa-trash";
    trashicon.setAttribute("aria-hidden","true");
    deletebutton.appendChild(trashicon);
    div.appendChild(deletebutton);
    console.log(deletebutton);

    deletebutton.addEventListener("click",function(){
        alert("hello");
    });
    
    file.addEventListener('change', () => {
        console.log("hello 2");
        Reader(file);
    });

    function Reader(input) {
        console.log("hello 3");
        if (input.files && input.files[0]) {
            var a = new FileReader();
            a.onload = (e) => {
                img.setAttribute("src", e.target.result);
                cameraicon.style.display = "none";
                console.log("hello 4");
            };
            a.readAsDataURL(input.files[0]);
        }
    };


    function generateHTMLRow(...args) {
        
        var row = "<tr>";
        row.id="row";
        for (var i = 0; i < args.length; i++) {
            row += "<td>" + args[i] + "</td>"
        }
        row+= "<td>" + getTableButton() + "</td>";
        row += "</tr>";
        return row;
    }

    function getTableButton() {
        return  div.innerHTML;
    }

    
    


    var req = new XMLHttpRequest();
    var method = "GET";
    var url = '../../php/admin/users.php';
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
                var id = data[a].id;
                var firstname = data[a].firstname;
                var lastname = data[a].lastname;
                var phone = data[a].phone;
                var email = data[a].email;
                var gender = data[a].gender;
                var dob = data[a].dob;

                var row = generateHTMLRow(
                    id, firstname, lastname, phone, email, gender, dob
                );
                console.log(row);
                $("#manage-members").append(row);
            }
        }
    }

});
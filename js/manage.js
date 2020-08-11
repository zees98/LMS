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
    



    GetUsers();

    function generateHTMLRow(...args) {
        var row = document.createElement("tr");
    
        for (var i = 0; i < args.length; i++) {
            var td = document.createElement("td");
            td.innerText = args[i];
            row.appendChild(td);
        }
        row.appendChild(GetDeleteButton(args[0]));
        return row;
    }

    function GetDeleteButton(id) {
        var deleteButton = document.createElement("button");
        var trashIcon = document.createElement("i");
        deleteButton.addEventListener("click", function(e) {
           DeleteUser(id);
        });
        deleteButton.classList.add("btn");
        deleteButton.className="btn";

        trashIcon.className="fa fa-trash";
        trashIcon.id="trash";
        trashIcon.setAttribute("aria-hidden","true");

        deleteButton.append(trashIcon);
        return deleteButton; 
    }
   
    function DeleteUser(user_id){
       var request = new XMLHttpRequest();
       request.open("POST","../../php/admin/deleteusers.php",true);
       request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       request.onreadystatechange= function(e){
        if (this.readyState == 4 && this.status == 200) {
            alert("Member " + user_id + " : " + "Deleted");
            location.reload();
            
        }
       }
      
       request.send("id="+user_id);
    }
    
    

    function GetUsers(){
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
}

});
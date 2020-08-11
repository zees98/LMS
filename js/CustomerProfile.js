
var inputfields = document.querySelectorAll("input");
inputfields.forEach(function (input) {
    input.disabled = true;
});
const file = document.querySelector('#file');
const img = document.querySelector('#profile_img');

$("#dashboard").click(function (e) {
    e.preventDefault();
    $("#form").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function () {
            window.location = target;
        }, 350);
    }
});

$("#issuedbooks").click(function (e) {
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function () {
            window.location = target;
        }, 350);
    }
});

$("#history").click(function (e) {
    e.preventDefault();
    $("#form").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function () {
            window.location = target;
        }, 350);
    }
});

$("#customerprofile").click(function (e) {
    e.preventDefault();
    $("#form").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function () {
            window.location = target;
        }, 350);
    }
});

file.addEventListener('change', () => {
    Reader(file);
});

function Reader(input) {
    if (input.files && input.files[0]) {
        var a = new FileReader();
        a.onload = (e) => {
            img.setAttribute("src", e.target.result);


        };
        a.readAsDataURL(input.files[0]);
    }
};
var editbutton = document.querySelector("#edit");
var submitbutton = document.querySelector("#submitbutton");
var cameraicon = document.querySelector(".filelabel");
var confirm_label = document.querySelector("#confirmlabel");
var confirm_icon = document.querySelector("#confirm_passicon");



var firstname = document.querySelector('#fn');
var lastname = document.querySelector('#ln');
var email = document.querySelector('#email');
var phoneno = document.querySelector('#phoneno');
var password = document.querySelector('#pass');
var confirm_password = document.querySelector("#confirm_pass");
var dob = document.querySelector("#dob");
var gender = document.querySelector("#gender");



editbutton.addEventListener('click', function (e) {
    e.preventDefault();
    editbutton.style.display = "none";
    submitbutton.style.display = "block";
    cameraicon.style.display = "block";
    confirm_password.style.display = "block";
    confirm_label.style.display = "block";
    confirm_icon.style.display = "block";
    inputfields.forEach(function (input) {
        input.disabled = false;
    });
});
submitbutton.addEventListener('click', (e) => {
    e.preventDefault();
    submitbutton.style.display = "none";
    editbutton.style.display = "block";
    cameraicon.style.display = "none";
    confirm_password.style.display = "none";
    confirm_label.style.display = "none";
    confirm_icon.style.display = "none";
    inputfields.forEach(function (input) {
        input.disabled = true;
    });
    update(9);

       
});

ReceiveData(7);


    function ReceiveData(id) {
        var receivedata = new XMLHttpRequest();
        receivedata.open("POST", "../php/customerProfile.php", true);
        receivedata.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        receivedata.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                console.log(data);
                console.log(data.length);
                for (var i = 0; i < data.length; i++) {
                    console.log(i);
                    firstname.value = data[i].firstname;
                    lastname.value = data[i].lastname;
                    email.value = data[i].email;
                    phoneno.value = data[i].phone;
                    password.value = data[i].password;
                    confirm_password.value = password.value;
                    dob.value = data[i].dob;
                    gender.value = data[i].gender;
                    if(data[i].image_path==null){
                    img.src = "../assets/icons/man.png";
                    }
                    else{
                        img.src = data[i].image_path; 
                    }
                }
            }
            
        }
        receivedata.send("id="+id);
         }


    function update(id){
        
        var counter=0;
        if (firstname.value === "" || lastname.value === "" || email.value === "" || phoneno.value === "" || dob.value === "" || password.value === "" || confirm_password === "" || file.value === ""||(gender.value!=="Male" && gender.value!=="Female") ) {
            alert("Please Fill All The Fields!");
        }
        else{
            if (!firstname.value.match(/^[A-Za-z]+$/)) {
                console.log("hello");
                firstname.style.cssText = "border-color:red";
            } else {
                counter++;
                firstname.style.cssText = "border-color:#0784eb";
            }
            if (!lastname.value.match(/^[A-Za-z]+$/)) {
                console.log("hello");
                lastname.style.cssText = "border-color:red";
            } else {
                counter++;
                lastname.style.cssText = "border-color:#0784eb";
            }
            if (!email.value.match(/(^[A-Za-z0-9+_.-]+@(.+)$)/)) {

                console.log("hello");
                email.style.cssText = "border-color:red";
            } else {
                counter++;
                email.style.cssText = "border-color:#0784eb";
            }
            if (ValidatePhoneNumber(phoneno.value)) {

                phoneno.style.cssText = "border-color:red";
            } else {
                counter++;
                phoneno.style.cssText = "border-color:#0784eb";
            }
            if (password.value.length < 8) {
                password.style.cssText = "border-color:red";
            } else {
                counter++;
                password.style.cssText = "border-color:#0784eb";
            }
            if (confirm_password.value !== password.value) {

                confirm_password.style.cssText = "border-color:red";
            } else {
                counter++;
                confirm_password.style.cssText = "border-color:#0784eb";
            }
        }

        console.log(gender.value);
        console.log(firstname.value);
        console.log(lastname.value);
        console.log(email.value);
        console.log(phoneno.value);
        console.log(dob.value);
        console.log(password.value);
        console.log(confirm_password.value);
        console.log(file.value);

        if(counter===6){
        var sendData = new XMLHttpRequest();
        sendData.open("POST", "../php/updateCustomer.php", true);
        sendData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        sendData.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                ReceiveData(id);
                console.log("success!");
            } else {
                console.log("failed");
            }
        }
        sendData.send(
            "id=" + id + "&" +
            "firstname=" + firstname.value.toLowerCase() + "&" +
            "lastname=" + lastname.value.toLowerCase() + "&" +
            "email=" + email.value.toLowerCase() + "&" +
            "phoneno=" + phoneno.value.toLowerCase() + "&" +
            "dob=" + dob.value.toLowerCase() + "&" +
            "gender=" + gender.value + "&" +
            "password=" + password.value.toLowerCase()
            // "img_url=" + img.src
        );
    }
else{
    alert("Enter Valid Data");
}

    function ValidatePhoneNumber(val) {
        if (!(val.length === 14 || val.length === 13)) {
            if (!(val.startsWith("+") || val.startsWith("00"))) {
                if (!val.match(/^[0-9]+$/)) {
                    return true;
                }
            }
            return false;
        }
        return false;
    }
}
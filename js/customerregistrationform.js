window.onload = (e) => {

    const firstname = document.querySelector('#fn');
    const lastname = document.querySelector('#ln');
    const email = document.querySelector('#em');
    const phoneno = document.querySelector('#pn');
    const password = document.querySelector('#pass');
    const confirm_password = document.querySelector('#confirm_pass');
    const dob = document.querySelector("#dob");
    const male = document.querySelector('#m');
    const female = document.querySelector('#f');
    const file = document.querySelector('#file');
    const submit = document.querySelector('#submit');

    const errormessage = document.querySelector("#msg");
    const img = document.querySelector('#image');
    const cameraicon = document.querySelector('#icon');

    var gender = "hello";

    submit.addEventListener('click', (e) => {
        e.preventDefault();
        // console.log(firstname.value);
        // console.log(lastname.value);
        // console.log(email.value);
        // console.log(phoneno.value);
        // console.log(dob.value);
        // console.log(password.value);
        // console.log(confirm_password.value);
        // console.log(file.value)
        // console.log(firstname.value.length);
        var counter=0;
        
        if (firstname.value === "" || lastname.value === "" || email.value === "" || phoneno.value === "" || dob.value === "" || password.value === "" || confirm_password === "" || file.value === "" || (male.checked === false && female.checked === false)) {
            errormessage.innerHTML = "Please Fill All The Fields!";
            setTimeout(() => errormessage.remove(), 3000);
        } else {


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
            if (male.checked) {
                gender = male.value;
                console.log(gender);
            } else {
                gender = female.value;
            }
        }
        if(counter===6){
        var sendData = new XMLHttpRequest(); 
        sendData.open("POST", "customerregistration.php", true);
        sendData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        sendData.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                window.location.href = "html/logIn.html";
                console.log("success!");
            } else {
                console.log("failed");
            }
        }
        console.log(firstname.value.toLowerCase());
        console.log(email.value.toLowerCase());
        sendData.send(
            "firstname=" + firstname.value.toLowerCase() + "&" +
            "lastname=" + lastname.value.toLowerCase() + "&" +
            "email=" + email.value.toLowerCase() + "&" +
            "phoneno=" + phoneno.value.toLowerCase() + "&" +
            "dob=" + dob.value.toLowerCase() + "&" +
            "gender=" + gender + "&" +
            "password=" + password.value.toLowerCase()
            // "img_url=" + img.src
        );
        }
        else{
            alert("Failed!");
        }

    });



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


    file.addEventListener('change', () => {
        Reader(file);
    });

    function Reader(input) {
        if (input.files && input.files[0]) {
            var a = new FileReader();
            a.onload = (e) => {
                img.setAttribute("src", e.target.result);
                cameraicon.style.display = "none";

            };
            a.readAsDataURL(input.files[0]);
        }
    };
}
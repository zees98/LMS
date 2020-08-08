window.onload = (e) => {
    var inputfields = document.querySelectorAll("input");
    inputfields.forEach(function(input) {
        input.disabled = true;
    });
    const file = document.querySelector('#file');
    const img = document.querySelector('#profile_img');



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
    var confirm_password = document.querySelector("#confirm_pass");
    var confirm_label = document.querySelector("#confirmlabel");
    var confirm_icon = document.querySelector("#confirm_passicon");
    editbutton.addEventListener('click', function(e) {
        e.preventDefault();
        editbutton.style.display = "none";
        submitbutton.style.display = "block";
        cameraicon.style.display = "block";
        confirm_password.style.display = "block";
        confirm_label.style.display = "block";
        confirm_icon.style.display = "block";
        inputfields.forEach(function(input) {
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
        inputfields.forEach(function(input) {
            input.disabled = true;
        });


    });
};
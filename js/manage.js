$(document).ready(function() {
    
    $('.subMenu').click(function(){
        $("#booktablediv").slideDown();
        $("#usertablediv").slideDown();

        
    });
    $('#managebook').click(function(){
        $("#booktablediv").slideDown();
        $("#usertablediv").slideUp();    
    });
    $('#manageuser').click(function(){
        $("#booktablediv").slideUp();
        $("#usertablediv").slideDown(); 
    });

    const file = document.querySelector('#file');
    const img = document.querySelector('#image');
    const cameraicon = document.querySelector('#camera-icon');
    console.log(file.id);
    
    file.addEventListener('change',()=>{
        console.log("hello 2");
        Reader(file);
    });
    function Reader(input){
        console.log("hello 3");
        if(input.files && input.files[0]){
            var a = new FileReader();
            a.onload = (e)=>{
                img.setAttribute("src",e.target.result);
                cameraicon.style.display="none";
                console.log("hello 4");
            };
            a.readAsDataURL(input.files[0]);
        }
    };
}); 
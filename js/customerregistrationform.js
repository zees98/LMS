window.onload= (e)=>{
    const file = document.querySelector('#file');
    const img = document.querySelector('#image');
    const cameraicon = document.querySelector('#icon');
    
    
    file.addEventListener('change',()=>{
        Reader(file);
    });
    function Reader(input){
        if(input.files && input.files[0]){
            var a = new FileReader();
            a.onload = (e)=>{
                img.setAttribute("src",e.target.result);
                cameraicon.style.display="none";

            };
            a.readAsDataURL(input.files[0]);
        }
    };
}



 $("#dashboard").click(function(e){
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function(){
            window.location = target;
        }, 350);
    }
});

$("#issuedbooks").click(function(e){
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function(){
            window.location = target;
        }, 350);
    }
});

$("#customerprofile").click(function(e){
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function(){
            window.location = target;
        }, 350);
    }
});


$("#history").click(function(e){
    e.preventDefault();
    $("#form").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function(){
            window.location = target;
        }, 350);
    }
});



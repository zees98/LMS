


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
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function(){
            window.location = target;
        }, 350);
    }
});


$("#pastdue").click(function(e){
    e.preventDefault();
    $("#side").fadeOut();
    if (this.href) {
        var target = this.href;
        setTimeout(function(){
            window.location = target;
        }, 350);
    }
});


function generateHTMLRow(...args) {
    var a = 0;
    var row = "<tr>";
    row += "<td>" + ++a + "</td>"
    for (var i = 0; i < args.length; i++) {
        row += "<td>" + args[i] + "</td>"
    }
    row += "</tr>";
    return row;
}

GetActivities();

function GetActivities(){
    var req = new XMLHttpRequest();
    var method = "GET";
    var url = '../php/history.php';
    var async = true;
    req.open(method, url, async);
    req.send();

    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            alert(this.responseText);
            var data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data.length);
            for (var a = 0; a < data.length; a++) {
                console.log(a);
                var activity = data[a].activity;
                var date = data[a].date;
                

                var row = generateHTMLRow(
                   activity,date
                );
                //console.log(row);
                $("#activity-log-body").append(row);
            }
        }
    }
}


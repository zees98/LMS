var pie_colors = [
    "grey",
    "yellow",
    "blue",
    "orange",
    "green",
    "red",
    "black",
    "purple"
];
$(document).ready(function() {

    drawNewUserGraph();
    makeProgressBars();

});




function drawNewUserGraph() {
    var lineChartReq = new XMLHttpRequest();
    lineChartReq.open("POST", "../../php/admin/statistics.php");
    lineChartReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    lineChartReq.onreadystatechange = function(e) {
        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText);
            var data = JSON.parse(this.responseText);
            var labels = [];
            var count = [];
            for (row in data) {
                labels.push(data[row].year);
                count.push(data[row].users);

            }
            // alert(count);

            let canvas = document.querySelector('#newUsers');


            let ctx = canvas.getContext('2d');

            let barChart = new Chart(canvas);

            Chart.defaults.global.defaultFontFamily = "";



            let massPopChart = new Chart(barChart, {

                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        // label: "Number of Users",
                        data: count,
                        backgroundColor: pie_colors,
                        fill: false,
                    }, ],
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                            }
                        }]
                    },


                },

            });
        }
    }
    lineChartReq.send("func=users");

}

function makeProgressBars() {

    var categoryReq = new XMLHttpRequest();

    categoryReq.open("POST", "../../php/admin/statistics.php");
    categoryReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    categoryReq.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            var categories = document.getElementById("categories");
            var table = document.createElement("table");
            var sum = 0;
            for (row in data) {
                sum += parseInt(data[row].count);
            }

            for (row in data) {
                var new_tr = document.createElement("TR");
                var td1 = document.createElement("TD");
                var td2 = document.createElement("TD");
                var progressBar = document.createElement("PROGRESS");
                progressBar.setAttribute("value", data[row].count);
                progressBar.setAttribute("max", sum);
                td1.append(data[row].cat_name);
                td2.appendChild(progressBar);
                new_tr.appendChild(td1);
                new_tr.appendChild(td2);
                table.appendChild(new_tr);

            }
            categories.appendChild(table);
            drawCategoriesGraph(data);


        }
    }

    categoryReq.send("func=categories");

}

function drawCategoriesGraph(data) {

    var jsonData = data;
    var labels = [];
    var values = [];


    for (row in jsonData) {
        labels.push(jsonData[row].cat_name);
        values.push(jsonData[row].count);
    }




    let canvas = document.querySelector('#pie');


    let ctx = canvas.getContext('2d');

    let barChart = new Chart(canvas);





    let massPopChart = new Chart(barChart, {

        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: pie_colors
            }, ],
        },
        options: {

            legend: {
                display: false
            },
        },

    });
}
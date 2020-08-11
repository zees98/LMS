$(document).ready(function() {

    drawNewUserGraph();
    drawCategoriesGraph();

});




function drawNewUserGraph() {
    var lineChartReq = new XMLHttpRequest();
    lineChartReq.open("GET", "../../php/admin/statistics.php");
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
            Chart.defaults.global.defaultFontSize = 18;


            let massPopChart = new Chart(barChart, {

                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Number of Users",
                        data: count,
                        backgroundColor: "grey",
                        fill: false,
                    }, ],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 0,
                            }
                        }]
                    },

                    title: {
                        display: true,
                        text: "New Users",

                    },
                    layout: {
                        padding: 20,

                    }
                },

            });
        }
    }
    lineChartReq.send();

}

function drawCategoriesGraph() {
    let canvas = document.querySelector('#categories');


    let ctx = canvas.getContext('2d');

    let barChart = new Chart(canvas);

    Chart.defaults.global.defaultFontFamily = "";



    let massPopChart = new Chart(barChart, {

        type: 'doughnut',
        data: {
            labels: [

                "Arts & Music",
                "Biographies",
                "Business",
                "Computer & tech",
                "Cooking",
                "Education",
                "Medical",
            ],
            datasets: [{
                label: "Number of Users",
                data: [
                    50,
                    100,
                    70,
                    150,
                    200,
                    200,
                    250,
                ],
                backgroundColor: [
                    "grey",
                    "yellow",
                    "blue",
                    "orange",
                    "green",
                    "red",
                    "black",
                ]
            }, ],
        },
        options: {
            legend: {
                display: true,
            },
            layout: {
                padding: 20,
            },
            title: {
                display: true,
                text: "Categories Popularity",


            },
        },

    });
}
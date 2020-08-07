$(document).ready(function() {

    drawNewUserGraph();
    drawCategoriesGraph();

});




function drawNewUserGraph() {
    let canvas = document.querySelector('#newUsers');


    let ctx = canvas.getContext('2d');

    let barChart = new Chart(canvas);

    Chart.defaults.global.defaultFontFamily = "";
    Chart.defaults.global.defaultFontSize = 18;


    let massPopChart = new Chart(barChart, {

        type: 'line',
        data: {
            labels: [

                "Jan",
                "Feb",
                "Mar",
                "April",
                "May",
                "June",
                "July",
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
                backgroundColor: "grey",
                fill: false,
            }, ],
        },
        options: {
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
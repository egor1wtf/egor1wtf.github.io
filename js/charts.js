// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages': ['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {
    var jsonData = $.ajax({
        url: "../php/getData.php",
        dataType: "json",
        async: false
    }).responseJSON;

    console.log(jsonData);


    // Create the data table.
    var data = new google.visualization.DataTable(jsonData);


    // Set chart options
    var options = {
        width: '100%', height: 300,
        'backgroundColor': 'transparent'
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
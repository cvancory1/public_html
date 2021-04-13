<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "getData.php",
          dataType: "json",
          async: false
          }).responseText;

        echo "hi";
        echo jsonData;
        var data = google.visualization.arrayToDataTable(jsonData);
        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
         };

        echo data;
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);


          
    //   // Create our data table out of JSON data loaded from server.
    //   var data = new google.visualization.DataTable(jsonData);
    // //   var data = google.visualization.arrayToDataTable(jsonData);

    //   // Instantiate and draw our chart, passing in some options.
    //   var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    //   chart.draw(data, {width: 400, height: 240});
    // }

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="donutchart"></div>
  </body>
</html>
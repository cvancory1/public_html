<!-- <html>
    Load the AJAX API-->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

        document.write("hi");
        document.write(jsonData);

        var data = google.visualization.arrayToDataTable([['ProgramName', 'Number'],['Biology' , 5], ['Chemistry' , 5], ['Computer Science' , 5], ['Data Science' , 5]]);
        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
         };
        document.write(data);



        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);

    }
           -->
    <!-- //   // Create our data table out of JSON data loaded from server.
    //   var data = new google.visualization.DataTable(jsonData);
    // //   var data = google.visualization.arrayToDataTable(jsonData);

    //   // Instantiate and draw our chart, passing in some options.
    //   var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    //   chart.draw(data, {width: 400, height: 240});
    // } -->



  
<!-- </html>  -->


<html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">


      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);


        
      function drawChart() {
        // var jsonData = $.ajax({
        //   url: "getData.php",
        //   dataType: "json",
        //   async: false
        //   }).responseText;
        // document.write(jsonData);
        // document.write("[['Program Name', 'Number'],['Biology', 5],['Chemistry ', 5],['Computer Science ', 5],['Data Science ', 5]]");

        var string = "{'cols': [  {'id':'','label':'Topping','pattern':'','type':'string'}, {'id':'','label':'Slices','pattern':'','type':'number'}],'rows': [{'c':[{'v':'Mushrooms','f':null},{'v':3,'f':null}]},{'c':[{'v':'Onions','f':null},{'v':1,'f':null}]},{'c':[{'v':'Olives','f':null},{'v':1,'f':null}]},{'c':[{'v':'Zucchini','f':null},{'v':1,'f':null}]},{'c':[{'v':'Pepperoni','f':null},{'v':2,'f':null}]} }";


        var data = new google.visualization.DataTable(jsonData);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
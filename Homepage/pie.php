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
          
      // Create our data table out of JSON data loaded from server.
        // var string = "{'cols': [  {'id':'','label':'Topping','pattern':'','type':'string'}, {'id':'','label':'Slices','pattern':'','type':'number'}],'rows': [{'c':[{'v':'Mushrooms','f':null},{'v':3,'f':null}]},{'c':[{'v':'Onions','f':null},{'v':1,'f':null}]},{'c':[{'v':'Olives','f':null},{'v':1,'f':null}]},{'c':[{'v':'Zucchini','f':null},{'v':1,'f':null}]},{'c':[{'v':'Pepperoni','f':null},{'v':2,'f':null}]} }";
        // var string = "{\"cols\": [{\"id\":\"\",\"label\":\"Topping\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"Slices\",\"pattern\":\"\",\"type\":\"number\"}],\"rows\": [{\"c\":[{\"v\":\"Mushrooms\",\"f\":null},{\"v\":3,\"f\":null}]},{\"c\":[{\"v\":\"Onions\",\"f\":null},{\"v\":1,\"f\":null}]},{\"c\":[{\"v\":\"Olives\",\"f\":null},{\"v\":1,\"f\":null}]},{\"c\":[{\"v\":\"Zucchini\",\"f\":null},{\"v\":1,\"f\":null}]}, {\"c\":[{\"v\":\"Pepperoni\",\"f\":null},{\"v\":2,\"f\":null}]}] }";

      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 450, height: 300});
      chart.draw(data, {width: 500, height: 500});

    }

    </script>
  </head>

  <body>

    <div style='width: 500px; height: 300px; margin-left: auto; margin-right: auto;'>
        <style>.embed-container {position: relative; padding-bottom: 80%; height: 0; max-width: 100%;} .embed-container iframe, .embed-container object, .embed-container iframe{position: absolute; top: 0; left: 0; width: 100%; height: 100%;} small{position: absolute; z-index: 40; bottom: 0; margin-bottom: -15px;}</style><div class="embed-container"><small><a href="//salisburyu.maps.arcgis.com/apps/Embed/index.html?webmap=d23174a625144d8c8f9cdd31fe766b4a&extent=-84.7735,32.9276,-66.723,41.3703&home=true&zoom=true&scale=true&search=true&searchextent=true&details=true&legendlayers=true&active_panel=legend&disable_scroll=false&theme=light" style="color:#0000FF;text-align:left" target="_blank">View larger map</a></small><br><iframe width="500" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="Alumni DB Demo" src="//salisburyu.maps.arcgis.com/apps/Embed/index.html?webmap=d23174a625144d8c8f9cdd31fe766b4a&extent=-84.7735,32.9276,-66.723,41.3703&home=true&zoom=true&previewImage=false&scale=true&search=true&searchextent=true&details=true&legendlayers=true&active_panel=legend&disable_scroll=false&theme=light"></iframe></div>
    </div>
    <div id="chart_div"></div>

  </body>
</html>
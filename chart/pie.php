<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 80%;
}

#chart-container {
    width: 80%;
    height: 50%;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });

        
        
        function showGraph()
        {
            {
                $.post("data1.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                     var marks = [];

                 

                    for (var i in data) {
                        
                
                        name.push(data[i].a);
                        marks.push(data[i].number);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'เดือน',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>
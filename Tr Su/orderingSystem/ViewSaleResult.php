<?php 
session_start(); 
if (!isset($_SESSION["sess_user"])) { 
    header("location:login.php"); 
} else { 
    date_default_timezone_set("Asia/Yangon"); 
?> 
    <!DOCTYPE html> 
    <html> 
    <head> 
        <title>Data Graph</title> 
        <meta charset='utf-8'> 
        <title>Ordering System</title> 
        <link rel="stylesheet" type="text/css" href="Order.css" /> 
        <style> 
            .error { 
                color: #FF0001; 
            } 
        </style> 
        <link rel="stylesheet" type="text/css" href="css/style.css"> 
        <script type="text/javascript" src="js/jquery.min.js"></script> 
        <script type="text/javascript" src="js/Chart.min.js"></script> 
    </head> 
 
    <body> 
        <center> 
            <img src="JunePhoto/OrderManagementlogo.jpg" margin="auto" width="200px" 
height="150px"></img> 
            <p> 
            <nav> 
                <div class="topnav" id="myTopnav">
                <a href="AdminWelcome.php">Home</a> 
                    <a href="APView.php">View Products</a> 
                    <a href="APAdd.php">Add Product</a> 
                    <a href="AReview.php">Review</a> 
                    <a href="AOView.php">Orders</a> 
                    <a href="ViewSaleResult.php">Report</a> 
                    <a href="PrintProduct.php" title="Print">Print Product Information</a> 
                    <a href="Logout.php" title="Logout">Logout</a> 
                    <h5>Welcome, <?= $_SESSION['sess_user']; ?>!</h5> 
                </div> 
            </nav> 
            </p> 
        </center> 
 
        <div class="wrapper"> 
            <h1 align="center">Sale Result</h1> 
            <div id="chart-container"> 
                <canvas id="graphCanvas" height="100"></canvas> 
            </div> 
 
            <script> 
                $(document).ready(function() { 
                    showGraph(); 
                }); 
 
                function showGraph() { 
                    { 
                        $.post("Sale.php", 
                            function(data) { 
                                //console.log(data); 
                                var name = []; 
                                var marks = []; 
 
                                for (var i in data) { 
                                    name.push(data[i].productname); 
                                    marks.push(data[i].tot); 
                                } 
 
                                var chartdata = { 
                                    labels: name, 
                                    datasets: [{ 
                                        label: 'Sale', 
                                        backgroundColor: [ 
                                            "#75bb11", "#5969aa", "#30d986", "#ffc750", "#006400","#cf0cf8", 
                                            "#00FF00","#FFD700","#1194bb", "#00FFFF", "#000080", "#f71523",  
                                            "#FFA500", "#6A5ACD", "#ff407b","pink", "Green", "violet", "yellow", "blue" 
                                        ], 
                                        borderColor: '#46d5f1', 
                                        hoverBackgroundColor: '#CCCCCC', 
                                        hoverBorderColor: '#666666', 
                                        data: marks 
                                    }] 
                                }; 
 
                                var graphTarget = $("#graphCanvas"); 
                                var barGraph = new Chart(graphTarget, { 
                                    // type: 'bar', 
                                    // type: 'pie', 
                                    // type: 'line', 
                                    type: 'doughnut', 
                                    // type: 'horizontalBar', 
                                    data: chartdata 
                                }); 
                            }); 
                    } 
                } 
            </script> 
    </body> 
    </div> 
    </html> 
<?php 
} 
?> 
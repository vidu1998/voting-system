<?php
session_start();
if (!isset($_SESSION['isadmin'])) {
    header('location:../');
}
$data = $_SESSION['data'];
?>







<?php



include('../actions/connect.php');



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Voting System Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">


    <style>
    footer {
       
   bottom:0;
   width:100%;
   height:60px; 
    }

    #reu {
        color: red;
        font-size: 19px;
    }

    a{
       
        text-decoration: none;
       }

    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['username', 'votes'],

            <?php
                $sql = "SELECT * FROM votes";
                $fire = mysqli_query($con, $sql);

                while ($result = mysqli_fetch_assoc($fire)) {
                    echo "['" . $result['username'] . "'," . $result['votes'] . "],";
                }



                ?>
        ]);

        var options = {
            title: 'Voting Result',


            legendTextStyle: {
                color: '#000000'
            },
            titleTextStyle: {
                color: '#000000'
            },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <header>

        <nav class="navbar navbar-dark bg-dark text-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../vote.jpg" alt="" width="60" height="32" class="d-inline-block align-text-top">
                    Voting System
                </a>
                <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                          <a class="nav-link " href="admindashboard.php">Home</a>
                        <a class="nav-link " href="usermanagement.php" aria-current="page">User Management</a>
                        <a class="nav-link active" href="votingmanagement.php">Voting Group Management</a>
                        <a class="nav-link active" href="adminvote.php">Admin Vote</a>
                     

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-dark bg-dark text-white">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">Voting Analytics</a>
                        </div>
                    </nav>



                    <div id="piechart" style="width: 600px; height: 500px;"></div>



                </div>
                <div class="col">
                    <nav class="navbar navbar-dark bg-dark text-white">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">Voting Data Summary</a>
                        </div>
                    </nav>
                    <br><br>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Number of Votes</div>
                                How Many Voted
                            </div>
                            <?php
                            $adminvote=1;  
                            $result = mysqli_query($con, 'SELECT SUM(votes) AS value_sum FROM votes');
                            $row = mysqli_fetch_assoc($result);
                            $sum = $row['value_sum']-$adminvote;


                            ?>






                            <h4><span class="badge bg-primary rounded-pill"> <?php echo $sum ?></span></h4>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Pending Votes</div>
                                Have to Vote
                            </div>
                            <?php
                            $result = mysqli_query($con, 'SELECT COUNT(status) AS value_pvot
                            FROM userdata where status=0');
                            $row = mysqli_fetch_assoc($result);
                            $countp = $row['value_pvot'];
                            if ($countp > 0) {
                                $vs = 'Not Completed';
                            } else {
                                $vs = 'Completed';
                            }



                            ?>

                            <h4><span class="badge bg-primary rounded-pill"><?php echo $countp ?></span></h4>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Votes completed</div>
                                How many done voting
                            </div>
                            <?php
                            $result = mysqli_query($con, 'SELECT COUNT(status) AS value_pvot
                            FROM userdata where status=1');
                            $row = mysqli_fetch_assoc($result);
                            $countp = $row['value_pvot'];
                            ?>
                            <h4><span class="badge bg-primary rounded-pill"><?php echo $countp ?></span></h4>
                        </li>
                    </ol>

                    <br><br>
                    <div class="col-sm-fluid" align="center">
                        <div class="card" isvisible=false>
                            <div class="card-body">
                                <h5 class="card-title">Vote Status</h5>
                                <p class="card-text">Vote is Finished or not</p>


                                <p id="reu"><?php echo $vs ?></p>
                            </div>
                        </div>



                    </div>
                </div>







    </section>

    <footer>


        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-sm">
                <a class="navbar-brand" href="#">
                    <h6>All Right Reserved</h6>
                </a>
            </div>
        </nav>
    </footer>
</body>

</html>

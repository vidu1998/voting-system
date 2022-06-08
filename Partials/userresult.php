<?php
session_start();
if(!isset($_SESSION['id']) ){
    header('location:../');
}
$data=$_SESSION['data'];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="style.css">
    

<style>
  

  footer {
  bottom: 0px;
  right: 0px;
  left: 0px;
}
#reu{
  color: red;
  font-size: 19px;
}
    a{
       
        text-decoration: none;
       }

.table-wrapper {

    overflow-y: scroll;
    overflow-x: scroll;
    height: fit-content;
    width: 1200px;
    max-height: 46.4vh;
    
  
    
   
    padding-bottom: 20px;
    
}
.table-fixed thead,
.table-fixed thead>th {
    background: #000000;
    color: #fff;
}

th, td {
  padding: 15px;
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
    <a class="navbar-brand" href="#">Voting Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " href="Dashboard.php">Home</a>
        <a class="nav-link " href="uservotingp.php" aria-current="page" >Voting Policy</a>
        <a class="nav-link active" href="userresult.php">Voting Result(live)</a>
        
      
      </div>
    </div>
  </div>
</nav>
    </header>
	<section>
<div class="container-fluid bg-light text-black" >
  <h3>Hi,<?php echo $data['username'];?><img src="../uploads/<?php echo $data['photo']; ?>" width="70" class="rounded-circle"></h3>

</div>

<nav class="navbar navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" >Voting result</a>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col">
     <div id="piechart" style="width: 600px; height: 500px;"></div>
    </div>
    <div class="col">
    	<br><br>
      <table class="col-xs-8  table-striped table-condensed table-fixed"   width="100%">
                <thead>
                    <tr>
                        <th scope="col">Sl no</th>
                        <th scope="col">Name</th>
                        
                        <th scope="col">photo</th>
                        <th scope="col">votes</th>
                     
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "Select * from `votes`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['username'];
                            $votes = $row['votes'];
                            $photo = $row['photo'];
                            echo '

<tr>
      <th scope="row">' . $id . '</th>

      <td>' . $name . '</td>
    
      <td><img src="../uploads/'. $photo .'"  class="rounded-circle" width="80" height="80" > </td>

      <td>' . $votes . '</td>


    </tr>

  ';
                        }
                    }









                    ?>







                </tbody>
            </table>
    </div>
  </div>
</div>



</section>

  <footer>
    

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-sm">
    <a class="navbar-brand" href="#"><h6>All Right Reserved</h6></a>
  </div>
</nav>
  </footer>
  </body>
</html>
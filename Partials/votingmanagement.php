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
    <title>Voting System Admin Voting Management</title>
    <link rel="stylesheet" href="style.css">


    <style>
    footer {

        position:absolute;
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


</head>

<body>
    <header>

        <nav class="navbar navbar-dark bg-dark text-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../vote.jpg" alt="" width="60" height="32" class="d-inline-block align-text-top">
                    Voting System
                </a>
               <a href="logout.php">  <button type="button" class="btn btn-danger">Logout</button></a>
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

        <div class="container">
            <button class="btn btn primary bg-primary my-5"><a href="votinggroupadd.php" class="text-light">Add vote group</a> </button>
<div class="table-responsive">
     <div class="outer-wrapper">
    <div class="table-wrapper">
            <table class="col-xs-8  table-striped table-condensed table-fixed"   width="100%">
                <thead>
                    <tr>
                        
                        <th scope="col">Name</th>
                        
                        <th scope="col">photo</th>
                        <th scope="col">votes</th>
                        <th scope="col">Operation</th>
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
  

      <td>' . $name . '</td>
    
      <td><img src="../uploads/'. $photo .'"  class="rounded-circle" width="80" height="80" > </td>

      <td>' . $votes . '</td>
<td>

<button class="btn btn-primary"><a href="votinggrouppicture.php? imgid=' . $id . '" class="text-light">Update Picture</a></button>  
<button class="btn btn-primary"><a href="votinggroupupdate.php? updateid=' . $id . '" class="text-light">Update</a></button>
<button class="btn btn-primary"><a href="votereset.php? updateid=' . $id . '" class="text-light">Reset votes</a></button>
<button class="btn btn-danger"><a href="../actions/deletevotegroup.php? deleteid=' . $id . '" class="text-light">Delete</a></button>





</td>

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
        </div>







    </section>

    <footer>


        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-md">
               
                    
                
            </div>
        </nav>
    </footer>
</body>

</html>

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
   <script src="../jquery.js"></script>
    <title>Voting System Admin Dashboard</title>
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
<script>
    
  
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
                 <a href="logout.php"><button type="button" class="btn btn-danger" ahr>Logout</button></a>
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
            <button class="btn btn primary bg-primary my-5"><a href="useradd.php" class="text-light">Add User</a> </button>
        <div class="outer-wrapper">
    <div class="table-wrapper">
            <table id="table1" class="col-xs-8  table-striped table-condensed table-fixed"   width="100%">
                <thead>
                    <tr>
                       
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">status</th>
                        <th scope="col">Password</th>
                        <th scope="col">photo</th>
                        
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "Select id,username,Email,mobile,password,photo,status from  `userdata`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['username'];
                            $email = $row['Email'];
                            $mobile = $row['mobile'];
                            $password = $row['password'];
                            $photo = $row['photo'];
                            $status=$row['status'];

                            if($status>0){
                                $stru="Voted";
                            }else{
                                $stru="Not Voted";
                            }
                            echo '

<tr>
      

      <td>' . $name . '</td>
      <td>' . $email . '</td>
      <td>' . $mobile . '</td>
      <td>' . $stru . '</td>
      <td>' . $password . '</td>
      
      <td><img src="../uploads/'. $photo .'"  class="rounded-circle" width="80" height="80" > </td>
<td>

<button class="btn btn-primary"><a href="updateuserimage.php? imgid=' . $id . '" class="text-light">Update Picture</a></button>  
<button class="btn btn-primary"><a href="updateuser.php? updateid=' . $id . '" class="text-light">Update</a></button>
<button class="btn btn-danger"><a href="../actions/deleteuser.php? deleteid=' . $id . '" class="text-light">Delete</a></button>
<button class="btn btn-danger"><a href="../actions/votechange.php? votechange=' . $id . '" class="text-light">Reset Vote </a></button>


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

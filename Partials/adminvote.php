<?php
session_start();
if(!isset($_SESSION['id']) ){
    header('location:../');
}
$data=$_SESSION['data'];

if($_SESSION['status']==1){
    $status='<b class="text-sucess">Voted</b>';
}else{
    $status='<b class="text-danger"> Not Voted</b>';
}

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
    <title>User DashBoard</title>
    <link rel="stylesheet" href="style.css">
    

<style>
  

  footer {

  bottom: -30px;
  right: 0px;
  left: 0px;
}
#reu{
  color: red;
  font-size: 19px;
}
#title{
font-family: verdana;
font-size:30px;
}
#main{
  position: absolute;
  bottom: -30px;
  right: 0px;
  left: 0px;
}
#vform{
  position: absolute;
  right: 20px;
  left: 10px;
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
<div class="container-fluid bg-light text-black" >
  <h3>Hi,<?php echo $data['username'];?><img src="../uploads/<?php echo $data['photo']; ?>" width="70" class="rounded-circle"></h3>

</div>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <nav class="navbar navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Voting Options</a>
  </div>
</nav>
      <table class="col-xs-8  table-striped table-condensed table-fixed"   width="100%">

  <thead>
    <tr>
      
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
     <?php

        if(isset($_SESSION['groups'])){
            $groups=$_SESSION['groups'];
            for($i=0;$i<count($groups);$i++){
                ?>
    <tr>
      
      <td><img src="../uploads/<?php echo $groups[$i]['photo']?>" alt="group image" class="rounded-circle" width="80" height="80" ></td>
      <td><strong class="text-black h5">Group
                                    Name:<?php echo $groups[$i]['username']?></strong><br>
                                </td> 


      <td>

           <form action="../actions/voting.php" method="post">
                            <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes']?>">
                            <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id']?>">


           <?php
                    
                    if($_SESSION['status']==1){
                     ?>
                            <p class="text-black text-center"> Already voted</p>
                            <?php
                    }else{
             ?>
                            <button class="btn btn-danger " id="bt"  text-black " type="submit">vote</button>
                            <?php
                }


                ?>



                        </form>
                     
                        
                        <?php
            }
            }else{
                ?>
                            <p> No Group Selected</p>
                      

                 

      </td>
    </tr>
    
                        <?php
            }

            

            ?>
  </tbody>
</table>








       </div>
    <div class="col">
     <nav class="navbar navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">User Details</a>
  </div>
</nav>
<br><br>
<ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">User Name</div>
      <?php echo $data['username'];?>
    </div>
    
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Email</div>
      <?php echo $data['Email'];?>
    </div>
   
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Telephone</div>
      <?php echo $data['mobile'];?>
    </div>
    
  </li>
</ol>

<br><br>
<div class="col-sm-fluid" align="center">
 




    <div class="card" isvisible=false>





      <div class="card-body">
        <h5 class="card-title">Your Voting Status</h5>
        <p class="card-text">Vote sucess  or not</p>
        <p id="reu"><?php echo $status ?></p>
      </div>
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
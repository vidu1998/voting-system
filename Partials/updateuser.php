<?php
session_start();
if (!isset($_SESSION['isadmin'])) {
    header('location:../');
}
$data = $_SESSION['data'];
?>








<?php

include '../actions/connect.php';
$id=$_GET['updateid'];
$sql="Select * from `userdata` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['username'];
$email=$row['Email'];
$mobile=$row['mobile'];
$password=$row['password'];
$photo=$row['photo'];




if(isset($_POST['submit'])){
  $name=$_POST['username'];
  $email=$_POST['Email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];



  $sql="update `userdata` set id=$id,username='$name',Email='$email',mobile='$mobile',password='$password' where id=$id";

  $result=mysqli_query($con,$sql);

  if($result){

   echo   '<script>
    
    alert("Updated sucessfully");
    window.location="usermanagement.php";
    </script>';

}

else{
  die(mysqli_error($con));
}

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Voting System Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    

<style>
  

  footer {
  position: absolute;
  bottom: -180px;
  right: 0px;
  left: 0px;
}
#reu{
  color: red;
  font-size: 19px;
}
a{
  a{
       
        text-decoration: none;
       }
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
    <a href="href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
    
  </div>
</nav>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" >Update User Details</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " href="usermanagement.php"><button type="button" class="btn btn-secondary">Back</button></a>
        <a class="nav-link " href="admindashboard.php"><button type="button" class="btn btn-secondary">Home</button></a>
 
      
      </div>
    </div>
  </div>
</nav>
    </header>
  <section>



<div class="card text-center">
  <div class="card-header">
    Updating User Details
  </div>
  <div class="card-body">
  <form method="POST"  >
  <div class="mb-3">
                <label class="form-label ">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Your User Name"
                     value=<?php echo $name;?> />

            </div>
            <div class="mb-3">
                <label class="form-label ">email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Your Email"
                     value=<?php echo $email;?> />

            </div>
            <div class="mb-3">
                <label class="form-label ">Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number"
                    minLength="10" maxLength="10" value=<?php echo $mobile;?> />

            </div>


            <div class="mb-3">
                <label class="form-label ">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Your Password"
                    value=<?php echo $password;?> />
            </div>
          
            <div class="mb-3 text-center">
              <label class="form-label  "> Photo</label><br>

            <img src="../uploads/<?php echo $photo;?>"  class="rounded-circle" width="100" height="100" > 

            
            </div>
             








      
<button type="submit" class="btn btn-primary" name="submit">Update</button>           
        </form>

      
  </div>
  <div class="card-footer text-muted">
   User Management
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


























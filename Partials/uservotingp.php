<?php
session_start();
if(!isset($_SESSION['id']) ){
    header('location:../');

}
$data=$_SESSION['data'];

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
    <a class="navbar-brand" href="#">Voting Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " href="Dashboard.php">Home</a>
        <a class="nav-link active" href="uservotingp.php" aria-current="page" >Voting Policy</a>
        <a class="nav-link" href="userresult.php">Voting Result(live)</a>
        
      
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
    <a class="navbar-brand" href="#" ><center>Voting Policy</center></a>
  </div>
</nav>
<iframe src="../voting.pdf" width="100%" height="500px">
 </iframe>



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
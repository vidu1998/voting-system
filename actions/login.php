<?php
session_start();
include('connect.php');

$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];


$sql="Select * from `userdata` where username='$username' and
 mobile='$mobile' and password='$password'";

 $result=mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
     $sql="select * from `votes`
      ";
      $resultgroup=mysqli_query($con,$sql);
      if(mysqli_num_rows($resultgroup)>0){
           $groups=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
           $_SESSION['groups']=$groups;
      }
      $data=mysqli_fetch_array($result);
      $_SESSION['id']=$data['id'];
      $_SESSION['status']=$data['status'];
      $_SESSION['isadmin']=$data['isadmin'];
     $_SESSION['data']=$data;
     
      
       if($_SESSION['isadmin']==0){
        echo'<script>
     
        window.location="../partials/dashboard.php";
        
        </script>';
       }else{
        echo'<script>
     
        window.location="../partials/admindashboard.php";
        $_SESSION["adminpri"]= "admin";
        </script>';
       }
        
      

 }else{
     echo'<script>
     alert("invalid credentials");
     window.location="../";
     
     </script>';
 }
?>

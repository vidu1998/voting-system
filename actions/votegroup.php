<?php
session_start();

include('connect.php');

$votename=$_POST['name'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];

move_uploaded_file($tmp_name,"../uploads/$image");
    $sql="insert into `votes` (username,photo,votes) values('$votename','$image','0')";
    
    $result=mysqli_query($con,$sql);

    if($result){
        
        $sql="select * from `votes`
        ";
        $resultgroup=mysqli_query($con,$sql);
        if(mysqli_num_rows($resultgroup)>0){
             $groups=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
             $_SESSION['groups']=$groups;
        }

     echo   '<script>
     window.location="../partials/admindashboard.php";
    alert("Added sucessfully");
    
    </script>';




}




?>

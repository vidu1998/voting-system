<?php
session_start();
include('connect.php');

$votes=$_POST['groupvotes'];
$totalvotes=$votes+1;

$gid=$_POST['groupid'];

$uid=$_SESSION['id'];


$updatevotes=mysqli_query($con,"update `votes` set votes='$totalvotes'
where id='$gid'

");
$updatestatus=mysqli_query($con,"update `userdata` set status=1 where id='$uid'

");

if($updatevotes and $updatestatus) {
   $getgroups=mysqli_query($con,"Select username,photo,votes,id from `votes`");
   $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
   $_SESSION['groups']=$groups;
   $_SESSION['status']=1;
   echo '<script>
    alert("voting sucessful");
    window.location="../partials/dashboard.php";
    </script>';
}else{
    echo '<script>
    alert("technical error");
    window.location="../partials/dashboard.php";
    </script>';
}

?>

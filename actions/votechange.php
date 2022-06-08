<?php 

include 'connect.php';

if(isset($_GET['votechange'])){
	$id=$_GET['votechange'];


	$sql="update `userdata` set status=0 where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		echo   '<script>
    
    alert("voted status Changed sucessfully");
    window.location="../partials/usermanagement.php";
    </script>';
		
	}else{
		die(mysqli_error($con));
	}
}


?>
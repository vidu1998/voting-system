<?php 

include 'connect.php';

if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];


	$sql="delete from `votes` where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		echo   '<script>
    
    alert("Deleted sucessfully");
    window.location="../partials/votingmanagement.php";
    </script>';
		
	}else{
		die(mysqli_error($con));
	}
}


?>
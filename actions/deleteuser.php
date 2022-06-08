<?php 

include 'connect.php';

if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];


	$sql="delete from `userdata` where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		echo   '<script>
    
    alert("Deleted sucessfully");
    window.location="../partials/usermanagement.php";
    </script>';
		
	}else{
		die(mysqli_error($con));
	}
}


?>
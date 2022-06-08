<?php

include('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];



if ($password != $cpassword) {
    echo '<script>
    
    alert("password do not match");
    window.location="../index.php";
    </script>';
} else {


    move_uploaded_file($tmp_name, "../uploads/$image");
    $sql = "insert into `userdata` (username,mobile,password,email,photo,
    status) values('$username','$mobile',
    '$password','$email','$image','0')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo   '<script>
    
    alert("Registration sucessfully");
    window.location="../";
    </script>';
    }
}

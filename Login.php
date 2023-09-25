<?php
include 'config.php';

$email = $_GET['email'];
$password = $_GET['password'];

$query = "SELECT * FROM user WHERE email = '$email' AND password= '$password'";
$msql = mysqli_query($conn, $query);
$result = mysqli_num_rows($msql);

if(!empty($email) && !empty($password)){
if($result == 1){
    echo "selamat datang";
}else{
    echo "gagal";
}
}else {
    echo "data anda error";
}

?>
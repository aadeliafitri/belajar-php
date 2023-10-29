<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$noHP = $_POST['no_hp'];
$pass = $_POST['password'];
$groupID = 3;
$phoneNumber = mysqli_real_escape_string($con, $noHP);
$password = mysqli_real_escape_string($con, md5($pass));

if(empty($nama)){
	header("Location:register.php?notif=tambahkosong");
}else if(empty($email)){
	header("Location:register.php?notif=tambahkosong");
}else if(empty($phoneNumber)){
	header("Location:register.php?notif=tambahkosong");
}else if(empty($password)){
	header("Location:register.php?notif=tambahkosong");
}else{
	$sql = "insert into `users` (`name`, `email`, `phone_number`, `password`, `username`, `group_id`) values ('$nama', '$email', '$phoneNumber', '$password', $phoneNumber, $groupID)";
	mysqli_query($con,$sql);
    header("Location:login.php");	
}
?>
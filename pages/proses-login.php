<?php 
require_once 'koneksi.php';
include '../models/user.php';
session_start();

$db = new Database();
$user = new User($db);

$con = $db->getConnection();

if (isset($_POST['login'])) {
    $usrname = $_POST['username'];
    $pass = $_POST['password'];
    $username = mysqli_real_escape_string($con, $usrname);
    $password = mysqli_real_escape_string($con, MD5($pass));
    
    //cek username dan password
    // $sql="select `id`, `name` from `users` 
    //         where `username`='$username' and 
    //         `password`='$password'";
    // $query = mysqli_query($con, $sql);

    $query = $user->ceklogin($username, $password);
    $jumlah = mysqli_num_rows($query);
    if(empty($user)){             
        header("Location: login.php?gagal=userKosong");
    }else if(empty($pass)){           
        header("Location: login.php?gagal=passKosong");
    }else if($jumlah==0){
        header("Location: login.php?gagal=userpassSalah");
    }else{
        // session_start();
        //get data
        while($data = $query->fetch_row()){
            $idUser = $data[0]; //1
            $name = $data[1]; //superadmin
            $_SESSION['id']=$idUser;
            $_SESSION['name']=$name;
            header("Location:dashboard.php");
        }           
    }
}    






//data statis
// $dataEmail = "admin@gmail.com";
// $dataPassword = "admin";

// if (isset($_POST["email"]) && isset($_POST["password"])) {
//     $email = $_POST["email"];
//     $password = $_POST["password"];

//     if ($email == $dataEmail && $password == $dataPassword) {
//         $_SESSION["email"] = $email;
//         header("Location: dashboard.php");
//     } else {
//         header("Location: login.php?error=1");
//     }
    
// } else {
//     header("Location: login.php");
// }

?>
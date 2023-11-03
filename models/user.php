<?php 
require_once 'koneksi.php';

class User{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function ceklogin($username, $password) {
        $sql="select `id`, `name` from `users` 
            where `username`='$username' and 
            `password`='$password'";
        $query = mysqli_query($this->db->getConnection(), $sql);
        return $query;
    }

    public function register($nama, $email, $phoneNumber, $password, $groupID) {
        $sql = "insert into `users` (`name`, `email`, `phone_number`, `password`, `username`, `group_id`) values ('$nama', '$email', '$phoneNumber', '$password', $phoneNumber, $groupID)";
        $query = mysqli_query($this->db->getConnection(), $sql);
        return $query;
    }
}
?>
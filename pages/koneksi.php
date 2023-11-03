<?php
// $hostname = "localhost";
// $username = "root";
// $password = "";
// $database = "pos_shop";

// $con = mysqli_connect($hostname, $username, $password, $database);

// if (!$con) {
//     die("Koneksi gagal: ". mysqli_connect_error());
// }
// echo "Koneksi Berhasil";

class Database {
    private $con;

    public function __construct() {
        $this->con = new mysqli("localhost", "root", "", "pos_shop");
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }
}
?>
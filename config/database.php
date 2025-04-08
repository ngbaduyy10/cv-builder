<?php
class Database {
    // Local database configuration
//    private $host = "localhost";
//    private $db_name = "cv-builder";
//    private $username = "root";
//    private $password = "";

    // Remote database configuration
    private $host = "p1us8ottbqwio8hv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $db_name = "p3016rq39iyk3zx6";
    private $username = "y65vnfmbeqycr2t7";
    private $password = "ufhwpj5gqcbj5hfb";

    public function connect() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8";
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $conn;
    }
}
?>
<?php
require 'database.php';
class Type extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }

    public function get_types() {
        $sql = "SELECT * FROM type";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
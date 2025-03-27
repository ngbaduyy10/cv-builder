<?php
require 'database.php';
class Template extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function get_templates() {
        $sql = "SELECT * FROM template";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

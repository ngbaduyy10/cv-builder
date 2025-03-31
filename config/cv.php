<?php
require 'database.php';

class Cv extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function create_cv ($data) {
        $sql = "
            INSERT INTO cv 
            (template_id, cvname, firstname, lastname, job, address, email, phoneno, summary, educations, projects, experiences, skills, achievements) 
            VALUES 
            (:template_id, :cvname, :firstname, :lastname, :job, :address, :email, :phoneno, :summary, :educations, :projects, :experiences, :skills, :achievements)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':template_id', $data['template_id']);
        $stmt->bindParam(':cvname', $data['cvname']);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':job', $data['job']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phoneno', $data['phoneno']);
        $stmt->bindParam(':summary', $data['summary']);
        $stmt->bindParam(':educations', $data['educations']);
        $stmt->bindParam(':projects', $data['projects']);
        $stmt->bindParam(':experiences', $data['experiences']);
        $stmt->bindParam(':skills', $data['skills']);
        $stmt->bindParam(':achievements', $data['achievements']);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
}
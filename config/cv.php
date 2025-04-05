<?php
require 'database.php';
session_start();

class Cv extends Database {
    private $conn;
    private $user_id;
    public function __construct() {
        $this->conn = $this->connect();
        $this->user_id = $_SESSION['user']['id'];
    }
    public function create_cv ($data) {
        if (empty($data['template_id']) || empty($data['cvname']) || empty($data['cv_image'])) {
            return false;
        }

        $sql = "
            INSERT INTO cv 
            (user_id, template_id, cvname, firstname, lastname, image, job, address, email, phoneno, summary, educations, projects, experiences, skills, achievements, cv_image) 
            VALUES 
            (:user_id, :template_id, :cvname, :firstname, :lastname, :image, :job, :address, :email, :phoneno, :summary, :educations, :projects, :experiences, :skills, :achievements, :cv_image)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':template_id', $data['template_id']);
        $stmt->bindParam(':cvname', $data['cvname']);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':image', $data['image']);
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
        $stmt->bindParam(':cv_image', $data['cv_image']);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function update_cv ($data) {
        $sql = "
            UPDATE cv 
            SET 
            template_id = :template_id, 
            cvname = :cvname, 
            firstname = :firstname, 
            lastname = :lastname, 
            image = :image,
            job = :job, 
            address = :address, 
            email = :email, 
            phoneno = :phoneno, 
            summary = :summary, 
            educations = :educations, 
            projects = :projects, 
            experiences = :experiences, 
            skills = :skills, 
            achievements = :achievements, 
            cv_image = :cv_image
            WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':template_id', $data['template_id']);
        $stmt->bindParam(':cvname', $data['cvname']);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':image', $data['image']);
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
        $stmt->bindParam(':cv_image', $data['cv_image']);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
        return true;
    }
    public function get_cv () {
        $sql = "
            SELECT c.id, c.template_id, c.cvname, c.cv_image, c.created_at, c.updated_at, t.name as template_name, t.preview_image
            FROM cv c
            JOIN template t ON c.template_id = t.id
            WHERE c.user_id = :user_id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cv_by_id ($id) {
        $sql = "
            SELECT * 
            FROM cv 
            WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete_cv ($id) {
        $sql = "
            DELETE FROM cv 
            WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }
}
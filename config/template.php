<?php
require 'database.php';
class Template extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function get_templates($sort, $keyword, $type) {
        $sql = "SELECT * FROM template";
        $params = [];

        if (!empty($keyword)) {
            $sql .= " WHERE (name LIKE :keyword OR description LIKE :keyword)";
            $params[':keyword'] = "%$keyword%";
        }

        if (!empty($type)) {
            $typeArray = explode(',', $type);
            $typeArray = array_map('intval', $typeArray);

            $placeholders = [];
            foreach ($typeArray as $index => $typeId) {
                $placeholder = ":type$index";
                $placeholders[] = $placeholder;
                $params[$placeholder] = $typeId;
            }
            $typeCondition = "type_id IN (" . implode(',', $placeholders) . ")";

            if ($keyword) {
                $sql .= " AND $typeCondition";
            } else {
                $sql .= " WHERE $typeCondition";
            }
        }

        $stmt = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            if (str_starts_with($key, ':type')) {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_template_by_id($id) {
        if (empty($id)) {
            return false;
        }
        $sql = "SELECT * FROM template WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create_template($name, $description, $preview_image, $type_id) {
        if (empty($name) || empty($description) || empty($preview_image) || empty($type_id)) {
            return false;
        }
        $sql = "INSERT INTO template (name, description, preview_image, type_id) VALUES (:name, :description, :preview_image, :type_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':preview_image', $preview_image);
        $stmt->bindParam(':type_id', $type_id);
        return $stmt->execute();
    }

    public function update_template($id, $name, $description, $preview_image, $type_id) {
        if (empty($id) || empty($name) || empty($description) || empty($preview_image) || empty($type_id)) {
            return false;
        }
        $sql = "UPDATE template SET name = :name, description = :description, preview_image = :preview_image, type_id = :type_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':preview_image', $preview_image);
        $stmt->bindParam(':type_id', $type_id);
        return $stmt->execute();
    }

    public function delete_template($id) {
        if (empty($id)) {
            return false;
        }
        $sql = "DELETE FROM template WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

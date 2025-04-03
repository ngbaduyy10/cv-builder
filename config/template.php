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
}

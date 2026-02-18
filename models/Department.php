<?php
class Department {
    private $conn;
    private $table_name = "departments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM ". $this->table_name. " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name) {
        $query = "INSERT INTO " . $this->table_name . " (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':name' => $name]);
    }

    public function delete($id) {
        $checkQuery = "SELECT COUNT(*) FROM employees WHERE dept_id = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->execute([$id]);

        if ($checkStmt->fetchColumn() > 0) {
            throw new Exception("Cannot delete department: It has assigned employees.");
        }

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        return $this->conn->prepare($query)->execute([$id]);
    }
}
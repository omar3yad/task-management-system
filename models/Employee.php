<?php
class Employee {
    private $conn;
    private $table_name = "employees";
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT e.*, d.name as department_name 
                  FROM " . $this->table_name . " e
                  LEFT JOIN departments d ON e.dept_id = d.id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name, $department_id,$email) {
            $query = "INSERT INTO " . $this->table_name . " (name, dept_id, email) VALUES (:name, :dept_id, :email)";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([
                ':name' => htmlspecialchars(strip_tags($name)),
                ':dept_id' => $department_id,
                ':email' => htmlspecialchars(strip_tags($email))
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        return $this->conn->prepare($query)->execute([$id]);
    }   
}
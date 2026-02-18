<?php
class Task {
    private $conn;
    private $table_name = "tasks";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllWithDetails() {
        $query = "SELECT t.*, e.name as employee_name, d.name as department_name 
           FROM tasks t
            JOIN employees e ON t.emp_id = e.id
             JOIN departments d ON e.dept_id = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($title, $desc, $status, $priority, $emp_id) {
        $query = "INSERT INTO tasks (title, description, status, priority, emp_id) 
                  VALUES (?, ?, ?, ?, ?)";
        return $this->conn->prepare($query)->execute([
            htmlspecialchars(strip_tags($title)),
            htmlspecialchars(strip_tags($desc)),
            $status,
            $priority,
            $emp_id
        ]);
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE tasks SET status = ? WHERE id = ?";
        return $this->conn->prepare($query)->execute([$status, $id]);
    }

    public function delete($id) {
        return $this->conn->prepare("DELETE FROM tasks WHERE id = ?")->execute([$id]);
    }
}
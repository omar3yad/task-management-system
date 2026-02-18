<?php
require_once 'models/Employee.php';
require_once 'models/Department.php';

class EmployeeController {
    private $empModel;
    private $deptModel;

    public function __construct($db) {
        $this->empModel = new Employee($db);
        $this->deptModel = new Department($db);
    }

    public function index() {
        $employees = $this->empModel->getAll();
        $departments = $this->deptModel->getAll();//Select
        require_once 'views/employees.php';
    }

public function store() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $dept_id = $_POST['dept_id'] ?? '';
        $email = $_POST['email'] ?? ''; 

        if (!empty($name) && !empty($dept_id) && !empty($email)) {
            $this->empModel->create($name, $dept_id, $email);
            header("Location: index.php?action=employees&status=success");
        } else {
            header("Location: index.php?action=employees&status=error&message=All fields are required");
        }
    }
}

    public function destroy() {
        if (isset($_GET['id'])) {
            try {
                $this->empModel->delete($_GET['id']);
                header("Location: index.php?action=employees&status=deleted");
            } catch (Exception $e) {
                header("Location: index.php?action=employees&status=error&message=Cannot delete employee with active tasks");
            }
        }
    }
}
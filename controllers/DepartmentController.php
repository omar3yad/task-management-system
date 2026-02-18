<?php
require_once 'models/Department.php';

class DepartmentController {
    private $deptModel;

    public function __construct($db) {
        $this->deptModel = new Department($db);
    }

    public function index() {
        $departments = $this->deptModel->getAll();
        require_once 'views/departments.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
            try{
            $this->deptModel->create($_POST['name']);
                header("Location: index.php?action=departments&status=success");
            }
            catch (Exception $e) {
                header("Location: index.php?action=departments&status=error&message=Department already exists!");
            }
        }
    }

    public function destroy() {
        if (isset($_GET['id'])) {
            try {
                $this->deptModel->delete($_GET['id']);
                header("Location: index.php?action=departments&status=deleted");
            } catch (Exception $e) {
                header("Location: index.php?action=departments&status=error&message=" . urlencode($e->getMessage()));
            }
        }
    }
}
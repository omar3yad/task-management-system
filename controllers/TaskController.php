<?php
require_once 'models/Task.php';
require_once 'models/Employee.php';

class TaskController {
    private $taskModel;
    private $empModel;

public function __construct($database) {
    $db_connection = $database->getConnection(); 
    $this->taskModel = new Task($db_connection);
    $this->empModel = new Employee($db_connection);}

    public function index() {
        require_once 'views/home.php';
    }
        public function task() {
        $tasks = $this->taskModel->getAllWithDetails();
        $employees = $this->empModel->getAll();//select
        require_once 'views/tasks.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->taskModel->create($_POST['title'], $_POST['desc'], $_POST['status'], $_POST['priority'], $_POST['employee_id']);
            header("Location: index.php?action=tasks&msg=added");
        }
    }

    public function changeStatus() {
        if (isset($_GET['id']) && isset($_GET['new_status'])) {
            $this->taskModel->updateStatus($_GET['id'], $_GET['new_status']);
            header("Location: index.php?action=tasks&msg=updated");
        }
    }
}
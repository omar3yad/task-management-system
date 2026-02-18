<?php
ini_set('display_errors', 1);

require_once 'config/Database.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/TaskController.php';
require_once 'controllers/DepartmentController.php';
require_once 'controllers/EmployeeController.php';

$database = new Database();
$auth = new AuthController($database);
$taskCtrl = new TaskController($database);
$empCtrl = new EmployeeController($database->getConnection());
$deptCtrl = new DepartmentController($database->getConnection());
$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $result = $auth->login();
        if (is_string($result)) { echo "<p style='color:red;'>$result</p>"; }
        break;
    case 'logout':$auth->logout();break;  
    case 'home':$taskCtrl->index(); break;

    case 'departments': $deptCtrl->index(); break;
    case 'store_dept': $deptCtrl->store(); break;
    case 'delete_dept': $deptCtrl->destroy(); break;

    case 'employees': $empCtrl->index(); break;
    case 'store_emp': $empCtrl->store(); break;
    case 'delete_emp': $empCtrl->destroy(); break;

    case 'tasks': $taskCtrl->task(); break;
    case 'store_task': $taskCtrl->store(); break;
    case 'update_task_status': $taskCtrl->changeStatus(); break;

    default:header("Location: index.php?action=login");break;
}
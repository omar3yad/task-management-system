<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Management</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

    <?php include 'views/sidebar.php'; ?>
    <div class="main-content">
        <div class="container-fluid py-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-dark">Tasks Management</h1>
                <button type="button" id="addBtn" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle-fill"></i> Create Task
                </button>
            </div>

            <div id="formCard" class="card shadow mb-4" style="display: none;">
                <div class="card-header bg-white">
                    <h6 class="m-0 fw-bold text-primary">New Task Details</h6>
                </div>
                <div class="card-body">
                    <form action="index.php?action=store_task" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Task Title</label>
                                <input type="text" name="title" class="form-control" placeholder="What needs to be done?" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Assign to Employee</label>
                                <select name="employee_id" class="form-select" required>
                                    <option value="">Choose Employee...</option>
                                    <?php foreach($employees as $emp): ?>
                                        <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['name']) ?> (<?= htmlspecialchars($emp['department_name']) ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Priority</label>
                                <select name="priority" class="form-select">
                                    <option value="Low">Low</option>
                                    <option value="Medium" selected>Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Initial Status</label>
                                <select name="status" class="form-select">
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Task Description</label>
                                <textarea name="desc" class="form-control" rows="2" placeholder="Describe the task details..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success px-4">Save Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow border-0 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Task</th>
                                <th>Assigned To</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tasks as $task): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($task['title']) ?></div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                        <?= htmlspecialchars($task['description']) ?>
                                    </small>
                                </td>
                                <td>
                                    <div class="small fw-bold"><?= htmlspecialchars($task['employee_name']) ?></div>
                                    <span class="badge bg-light text-dark border fw-normal" style="font-size: 0.7rem;">
                                        <?= htmlspecialchars($task['department_name']) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php 
                                        $badgeClass = ($task['priority'] == 'High') ? 'bg-danger' : (($task['priority'] == 'Medium') ? 'bg-warning text-dark' : 'bg-info');
                                    ?>
                                    <span class="badge <?= $badgeClass ?>"><?= $task['priority'] ?></span>
                                </td>
                                <td>
                                    <?php 
                                        $statusClass = ($task['status'] == 'Completed') ? 'text-success' : (($task['status'] == 'In Progress') ? 'text-primary' : 'text-secondary');
                                    ?>
                                    <i class="bi bi-circle-fill me-1 <?= $statusClass ?>" style="font-size: 0.6rem;"></i>
                                    <span class="small fw-bold"><?= $task['status'] ?></span>
                                </td>
                                <td class="text-end pe-4">
                                    <select onchange="if(this.value) location = this.value;" class="form-select form-select-sm d-inline-block w-auto">
                                        <option value="">Update Status</option>
                                        <option value="index.php?action=update_task_status&id=<?= $task['id'] ?>&new_status=Pending">Pending</option>
                                        <option value="index.php?action=update_task_status&id=<?= $task['id'] ?>&new_status=In Progress">In Progress</option>
                                        <option value="index.php?action=update_task_status&id=<?= $task['id'] ?>&new_status=Completed">Completed</option>
                                    </select>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/main.js"></script>

    <script>
    $(document).ready(function(){
        $("#addBtn").off('click').on('click', function(e){
            e.preventDefault();
            $("#formCard").stop(true, true).slideToggle(400);
        });

        $("#mobile-toggle").on('click', function(){
            $(".sidebar").toggleClass("active");
        });
    });
    </script>
</body>
</html>
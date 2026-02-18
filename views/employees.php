<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Management</title>
    
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
                <h1 class="h3 mb-0 text-dark">Employees Management</h1>
                <button id="addEmpBtn" class="btn btn-primary shadow-sm">
                    <i class="bi bi-person-plus-fill"></i> Add New Employee
                </button>
            </div>

            <?php if(isset($_GET['status'])): ?>
                <div id="alert" class="alert alert-<?= $_GET['status'] == 'error' ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
                    <?= isset($_GET['message']) ? htmlspecialchars($_GET['message']) : 'Operation completed successfully!' ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div id="empFormCard" class="card shadow mb-4" style="display: none;">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">New Employee Information</h6>
                </div>
                <div class="card-body">
                    <form action="index.php?action=store_emp" method="POST" class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Department</label>
                            <select name="dept_id" class="form-select" required>
                                <option value="">Choose...</option>
                                <?php foreach($departments as $dept): ?>
                                    <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success w-100">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow border-0 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($employees)): ?>
                                <tr><td colspan="4" class="text-center py-5 text-muted">No employees found in the database.</td></tr>
                            <?php endif; ?>
                            <?php foreach($employees as $emp): ?>
                            <tr>
                                <td class="ps-4 text-muted">#<?= $emp['id'] ?></td>
                                <td>
                                    <div class="fw-bold"><?= htmlspecialchars($emp['name']) ?></div>
                                    <small class="text-muted"><?= htmlspecialchars($emp['email'] ?? '') ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3">
                                        <?= htmlspecialchars($emp['department_name'] ?? 'Unassigned') ?>
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="index.php?action=delete_emp&id=<?= $emp['id'] ?>" class="btn btn-outline-danger btn-sm delete-confirm">
                                        <i class="bi bi-trash3"></i> Delete
                                    </a>
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
    // $(document).ready(function(){
    //     $("#addEmpBtn").click(function(){
    //         $("#empFormCard").slideToggle();
    //     });
    //     $("#mobile-toggle").click(function(){
    //         $(".sidebar").toggleClass("active");
    //     });
    // });
    </script>
</body>
</html>
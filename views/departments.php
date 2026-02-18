<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/style.css">
 </head>
<body class="bg-light">

    <?php include 'views/sidebar.php'; ?>

    <div class="main-content">
        <div class="container-fluid py-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Department Management</h1>
                <button id="toggleDeptForm" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i>Add Department
                </button>
            </div>

            <?php if(isset($_GET['status'])): ?>
                <div id="alert" class="alert alert-<?= $_GET['status'] == 'error' ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
                    <?= isset($_GET['message']) ? htmlspecialchars($_GET['message']) : 'Operation successful!' ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div id="deptFormCard" class="card shadow mb-4" style="display: none;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Department</h6>
                </div>
                <div class="card-body">
                    <form action="index.php?action=store_dept" method="POST" class="row g-3">
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" placeholder="e.g. Finance, IT Support" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Department Name</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($departments)): ?>
                                <tr><td colspan="4" class="text-center py-4 text-muted">No departments found.</td></tr>
                            <?php endif; ?>
                            
                            <?php foreach($departments as $dept): ?>
                            <tr>
                                <td class="ps-4">#<?= $dept['id'] ?></td>
                                <td><span class="fw-bold"><?= htmlspecialchars($dept['name']) ?></span></td>
                                <td class="text-end pe-4">
                                    <a href="index.php?action=delete_dept&id=<?= $dept['id'] ?>" class="btn btn-outline-danger btn-sm delete-confirm">
                                        <i class="bi bi-trash"></i> Delete
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/main.js"></script>
    
    <script>
    $(document).ready(function(){
        $("#mobile-toggle").click(function(){
            $(".sidebar").toggleClass("active");
        });
        $("#toggleDeptForm").click(function(){
            $("#deptFormCard").slideToggle();
        });
    });
    </script>
</body>
</html>
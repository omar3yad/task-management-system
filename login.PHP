<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login page Tasks Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <h3 class="text-center mb-4">Login</h3>
                    
                    <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger"></div>
                    <?php endif; ?>

<form action="index.php?action=login" method="POST"> <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">دخول</button>
</form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
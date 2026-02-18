<style>
    :root {
        --width: 250px;
        --primary-color: #2c3e50;
        --accent-color: #3498db;
    }

    body {
        display: flex;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background: #f4f7f6;
    }

    .sidebar {
        width: 250px;;
        height: 100vh;
        background: var(--primary-color);
        color: white;
        /* position: fixed; */
        display: flex;
        flex-direction: column;
        padding-top: 20px;
    }

    .sidebar h2 {
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 30px;
        color: var(--accent-color);
    }

    .sidebar a {
        padding: 15px 25px;
        text-decoration: none;
        color: #ecf0f1;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .sidebar a:hover {
        background: #34495e;
        border-left: 4px solid var(--accent-color);
    }

    .main-content {
        /* margin-left: 250px; */
        width: calc(100% - 250px);
        padding: 30px;
    }

    .logout-btn {
        margin-top: auto;
        background: #c0392b !important;
    }

    .hamburger-btn {
        display: none;
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 1.2rem;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }

    @media (max-width: 768px) {
        .hamburger-btn {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1100;
        }

        .sidebar {
            display: none;
            width: 100%;
            height: FIT-CONTENT;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding-top: 60px;
            overflow-y: auto;
        }

        .sidebar.active {
            display: flex;
        }

        .main-content {
            margin-left: 0;
            width: 100%;
            padding-top: 70px;
        }
        .logout-btn{
            MARGIN:0
        }
        .sidebar h2{
            display: none;
        }
    }
</style>

<button id="mobile-menu-btn" class="hamburger-btn" aria-controls="sidebar" aria-expanded="false">
     &#9776; <span> Tasks Management System </span><!--//hamburger menu-->
</button>

<div id="sidebar" class="sidebar">
    <h2>Tasks Management System</h2>
    <a href="index.php?action=home">&#x1F3E0; Home</a>
    <a href="index.php?action=departments">&#x1F3E2; Departments</a>
    <a href="index.php?action=employees">&#x1F465; Employees</a>
    <a href="index.php?action=tasks">&#x1F4CB; Tasks</a>
    <a href="index.php?action=logout" class="logout-btn">&#x1F6AA; Logout</a>
</div>

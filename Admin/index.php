<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="logo">
            <h3>School Admin</h3>
        </div>

        <ul>

            <li class="active">
                <a href="index.php">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="student.php">
                    <i class="fa fa-user-graduate"></i>
                    <span>Students</span>
                </a>
            </li>

            <li>
                <a href="teacher.php">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li>
                <a href="registrar-office.php">
                    <i class="fa fa-building"></i>
                    <span>Registrar Office</span>
                </a>
            </li>

            <li>
                <a href="class.php">
                    <i class="fa fa-school"></i>
                    <span>Classes</span>
                </a>
            </li>

            <li>
                <a href="section.php">
                    <i class="fa fa-layer-group"></i>
                    <span>Sections</span>
                </a>
            </li>

            <li>
                <a href="course.php">
                    <i class="fa fa-book"></i>
                    <span>Courses</span>
                </a>
            </li>

            <li>
                <a href="grade.php">
                    <i class="fa fa-chart-line"></i>
                    <span>Grades</span>
                </a>
            </li>

            <li>
                <a href="settings.php">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>

            <li>
                <a href="../logout.php">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    </div>

    <!-- Main Content -->

    <div class="main-content">
<div class="datetime me-3">
    <span id="liveDateTime"></span>
</div>
        <!-- Top Navbar -->

        <div class="topbar">

            <div class="left">

                <h3>
                    <i class="fa fa-gauge"></i>
                    Dashboard
                </h3>

            </div>

           

        </div>

        <!-- Page Content Start -->

        <div class="container-fluid mt-4">
<!-- Dashboard Title -->
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="bg-white shadow-sm rounded p-3">
            <h3>
                <i class="fa fa-user-graduate"></i>
                Student Management
            </h3>
        </div>
    </div>
</div>

<!-- Dashboard Cards -->
<div class="row g-4">

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card bg-primary text-white border-0 shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h2>550</h2>

                        <p>Total Students</p>

                    </div>

                    <i class="fa fa-graduation-cap fa-3x"></i>

                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card bg-success text-white border-0 shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h2>520</h2>

                        <p>Active Students</p>

                    </div>

                    <i class="fa fa-user-check fa-3x"></i>

                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card bg-warning text-white border-0 shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h2>35</h2>

                        <p>New Admission</p>

                    </div>

                    <i class="fa fa-user-plus fa-3x"></i>

                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card bg-danger text-white border-0 shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h2>30</h2>

                        <p>Inactive Students</p>

                    </div>

                    <i class="fa fa-user-times fa-3x"></i>

                </div>

            </div>

        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="card shadow mt-4">

    <div class="card-header bg-dark text-white">

        <i class="fa fa-bolt"></i>

        Quick Actions

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 mb-2">

                <a href="student-add.php" class="btn btn-success w-100">

                    <i class="fa fa-user-plus"></i>

                    Add Student

                </a>

            </div>

            <div class="col-md-3 mb-2">

                <a href="teacher-add.php" class="btn btn-success w-100">

                    <i class="fa fa-user-plus"></i>

                    Add Teacher
                </a>
                

            </div>

            <div class="col-md-3 mb-2">

                <a href="registrar-office-add.php" class="btn btn-success w-100">

                    <i class="fa fa-user-plus"></i>

                    Registrar Add 
                </a>

               

            </div>

            <div class="col-md-3 mb-2">

                <a href="class-add.php" class="btn btn-success w-100">

                    <i class="fa fa-user-plus"></i>

                    Add Class

                </a>

            </div>
      <div class="col-md-3 mb-2">

                <a href="section-add.php" class="btn btn-success w-100">

                    <i class="fa fa-user-plus"></i>

                    Add Section

                </a>

            </div>
        </div>

    </div>

</div>


   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function updateClock() {

    const now = new Date();

    const options = {
        weekday: 'short',
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    };

    const date = now.toLocaleDateString('en-GB', options);

    const time = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
    });

    document.getElementById("liveDateTime").innerHTML =
        '<i class="fa fa-calendar"></i> ' + date +
        ' &nbsp; | &nbsp; <i class="fa fa-clock-o"></i> ' + time;
}

updateClock();
setInterval(updateClock, 1000);
</script>
</body>
</html>

<?php
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
<?php
session_start();
if (!isset($_SESSION['teacher_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'Teacher') {
    header('Location: ../login.php');
    exit;
}

include '../DB_connection.php';
include 'data/teacher.php';

$teacher = getTeacherById($_SESSION['teacher_id'], $conn);
if ($teacher === 0) {
    header('Location: ../logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo1.jpg">
</head>
<body>
    <?php include 'inc/navbar.php'; ?>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <form method="post" action="req/teacher-profile.php" class="shadow p-4 my-5 form-w">
            <h3>Update Profile</h3><hr>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?= htmlspecialchars($_GET['success'], ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?= htmlspecialchars($teacher['fname'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?= htmlspecialchars($teacher['lname'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($teacher['address'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email_address" value="<?= htmlspecialchars($teacher['email_address'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="<?= htmlspecialchars($teacher['phone_number'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['teacher_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'Teacher') {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../profile.php');
    exit;
}

include '../../DB_connection.php';

$teacher_id = $_SESSION['teacher_id'];
$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$address = trim($_POST['address'] ?? '');
$email = trim($_POST['email_address'] ?? '');
$phone_number = trim($_POST['phone_number'] ?? '');

if (empty($fname) || empty($lname) || empty($address) || empty($email) || empty($phone_number)) {
    header('Location: ../profile.php?error=All profile fields are required');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../profile.php?error=Invalid email format');
    exit;
}

$sql = 'UPDATE teachers SET fname = ?, lname = ?, address = ?, email_address = ?, phone_number = ? WHERE teacher_id = ?';
$stmt = $conn->prepare($sql);
$updated = $stmt->execute([$fname, $lname, $address, $email, $phone_number, $teacher_id]);

if ($updated) {
    header('Location: ../profile.php?success=Profile updated successfully');
    exit;
}

header('Location: ../profile.php?error=Profile update failed');
exit;

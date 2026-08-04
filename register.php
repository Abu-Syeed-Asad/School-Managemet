<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed.']);
    exit;
}

$body = file_get_contents('php://input');
$data = json_decode($body, true);
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request payload.']);
    exit;
}

$name = trim($data['name'] ?? '');
$mobile = trim($data['mobile'] ?? '');
$email = trim($data['email'] ?? '');
$password = trim($data['password'] ?? '');

if ($name === '' || $email === '' || $password === '' || $mobile === '') {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email address.']);
    exit;
}

if (strlen($password) < 8) {
    http_response_code(400);
    echo json_encode(['error' => 'Password must be at least 8 characters.']);
    exit;
}

if (!preg_match('/^[0-9]{7,15}$/', $mobile)) {
    http_response_code(400);
    echo json_encode(['error' => 'Mobile number must contain 7-15 digits.']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode(['error' => 'An account with this email already exists.']);
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $insert = $pdo->prepare('INSERT INTO users (full_name, mobile, email, password_hash) VALUES (:full_name, :mobile, :email, :password_hash)');
    $insert->execute([
        'full_name' => $name,
        'mobile' => $mobile,
        'email' => $email,
        'password_hash' => $hash,
    ]);

    http_response_code(201);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error while registering user.']);
}

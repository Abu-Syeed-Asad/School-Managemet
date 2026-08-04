<?php
header('Content-Type: application/json; charset=utf-8');
session_start();

if (empty($_SESSION['user'])) {
    http_response_code(401);
    echo json_encode(['error' => 'User is not logged in.']);
    exit;
}

echo json_encode(['user' => $_SESSION['user']]);

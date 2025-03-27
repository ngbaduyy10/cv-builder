<?php
require_once '../config/template.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handleGetRequest () {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_templates') {
            $result = (new Template())->get_templates();
            echo json_encode(['success' => true, 'data' => $result]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}
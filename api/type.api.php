<?php
require_once '../config/type.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handleGetRequest() {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_types') {
            $result = (new Type())->get_types();
            echo json_encode(['success' => true, 'data' => $result]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}

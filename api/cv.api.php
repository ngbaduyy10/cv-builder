<?php
require_once '../config/cv.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handlePostRequest () {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create_cv') {
            $result = (new Cv())->create_cv($_POST);
            echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV saved successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}

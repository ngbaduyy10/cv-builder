<?php
require_once '../config/cv.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handlePostRequest () {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create_cv') {
            $result = (new Cv())->create_cv($_POST);
            echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV saved successfully']);
        } else if ($_POST['action'] === 'update_cv') {
            $result = (new Cv())->update_cv($_POST);
            echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}

function handleGetRequest () {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_cv') {
            $result = (new Cv())->get_cv();
            echo json_encode(['success' => true, 'data' => $result]);
        } else if ($_GET['action'] === 'get_cv_by_id') {
            if (isset($_GET['id'])) {
                $result = (new Cv())->get_cv_by_id($_GET['id']);
                echo json_encode(['success' => true, 'data' => $result]);
            } else {
                echo json_encode(['success' => false, 'message' => 'ID not provided']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}

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
            if (!$result) {
                echo json_encode(['success' => false, 'message' => 'Failed to create CV']);
            } else {
                echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV saved successfully']);
            }
        } else if ($_POST['action'] === 'update_cv') {
            $result = (new Cv())->update_cv($_POST);
            echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV updated successfully']);
        } else if ($_POST['action'] === 'delete_cv') {
            $result = (new Cv())->delete_cv($_POST['id']);
            echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV deleted successfully']);
        } else if ($_POST['action'] === 'change_public_status') {
            $result = (new Cv())->change_public_status($_POST['id'], $_POST['status']);
            echo json_encode(['success' => true, 'data' => $result, 'message' => 'CV status changed successfully']);
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
        } else if ($_GET['action'] === 'get_public_cv') {
            $result = (new Cv())->get_public_cv($_GET['id']);
            if ($result) {
                echo json_encode(['success' => true, 'data' => $result]);
            } else {
                echo json_encode(['success' => false, 'message' => 'CV not found or not public']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}

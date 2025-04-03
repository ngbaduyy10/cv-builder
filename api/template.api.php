<?php
require_once '../config/template.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handleGetRequest () {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_templates') {
            $result = (new Template())->get_templates($_GET['sort'], $_GET['keyword'], $_GET['type']);
            echo json_encode(['success' => true, 'data' => $result]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}

function handlePostRequest () {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create_template') {
            $result = (new Template())->create_template($_POST['name'], $_POST['description'], $_POST['preview_image'], $_POST['type_id']);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Template created successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to create template']);
            }
        } else if ($_POST['action'] === 'delete_template') {
            $result = (new Template())->delete_template($_POST['id']);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Template deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete template']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}
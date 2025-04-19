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
        } else if ($_GET['action'] === 'get_template_by_id') {
            $result = (new Template())->get_template_by_id($_GET['id']);
            if ($result) {
                echo json_encode(['success' => true, 'data' => $result]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Template not found']);
            }
        } else if ($_GET['action'] === 'get_ex_template') {
            $result = (new Template())->get_ex_template();
            echo json_encode(['success' => true, 'data' => $result]);
        } else if ($_GET['action'] === 'get_template_code') {
            $template_id = $_GET['templateId'] ?? '1';
            $template_file = __DIR__ . "/../template/cv-{$template_id}.php";

            if (file_exists($template_file)) {
                ob_start();
                include $template_file;
                $html = ob_get_clean();
                echo $html;
            } else {
                echo json_encode(['success' => false, 'message' => 'Template file not found']);
            }
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
        } else if ($_POST['action'] === 'update_template') {
            $result = (new Template())->update_template($_POST['id'], $_POST['name'], $_POST['description'], $_POST['preview_image'], $_POST['type_id']);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Template updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update template']);
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
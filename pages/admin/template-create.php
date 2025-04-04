<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ?page=404');
    exit();
}

$templateId = $_GET['template_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&family=Sen:wght@400..800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/admin/sidebar.css" />
    <link rel="stylesheet" href="assets/css/admin/template-create.css" />
    <title>Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body id="admin-content" class="closed">
<?php
include __DIR__ . '/../../layouts/admin/sidebar.php';
?>
<div class="template-create">
    <div class="content">
        <div class="title d-none d-sm-block">
            <?php
            if ($templateId) {
                echo 'EDIT TEMPLATE';
            } else {
                echo 'CREATE TEMPLATE';
            }
            ?>
        </div>
        <form id="template-form" class="d-flex flex-column gap-4 mt-3">
            <div class="form-group">
                <label for="template-name">Name</label>
                <input type="text" class="form-control" id="template-name" placeholder="Enter template name" required>
            </div>
            <div class="form-group">
                <label for="template-description">Description</label>
                <textarea class="form-control" id="template-description" rows="4" placeholder="Enter template description" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="template-image">Preview Image</label>
                    <input type="file" class="form-control" id="template-image" accept="image/*">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="template-type">Type</label>
                    <select class="form-select" id="template-type" required>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class = "preview-image col-12 col-md-6">
                    <img class="w-100" src="" alt="" id="preview-image">
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="?page=template-manage" class="button button-cancel">Cancel</a>
                <button type="submit" class="button">
                    <?php
                    if ($templateId) {
                        echo 'Update';
                    } else {
                        echo 'Create';
                    }
                    ?>
                </button>
            </div>
        </form>
    </div>
</div>
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script src="assets/js/admin/admin.js"></script>
<script src="assets/js/admin/template-create.js"></script>
</body>
</html>

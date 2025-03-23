<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        include './pages/client/home.php';
        break;

    case 'template':
        include './pages/client/template.php';
        break;

    case 'cv-creation':
        include './pages/client/cv-creation.php';
        break;

    case 'my-cv':
        include './pages/client/my-cv.php';
        break;

    case 'contact':
        include './pages/client/contact.php';
        break;

    case 'template-manage':
        include './pages/admin/template-manage.php';
        break;

    case 'user-manage':
        include './pages/admin/user-manage.php';
        break;

    case 'login':
        include './pages/auth/login.php';
        break;

    case 'register':
        include './pages/auth/register.php';
        break;

    case 'logout':
        include './pages/auth/logout.php';
        break;

    default:
        include './pages/404.php';
        break;
}

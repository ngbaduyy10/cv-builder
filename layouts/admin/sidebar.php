<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="sidebar py-3 px-1 d-flex flex-column">
    <div class="sidebar-logo px-3">
        <div class="logo">Bright</div>
        <i class="bx bx-menu" id="btn-menu"></i>
    </div>
    <hr class="sidebar-hr" />
    <ul class="sidebar-list d-flex flex-column gap-1">
        <li>
            <a href="?page=user-manage" class="py-3 px-4 <?php echo ($_GET['page'] == "user-manage") ? 'active' : ''; ?>">
                <i class="bx bx-user"></i>
                <span class="links-name">User</span>
            </a>
        </li>
        <li>
            <a href="?page=template-manage" class="py-3 px-4 <?php echo ($_GET['page'] == "template-manage") ? 'active' : ''; ?>">
                <i class='bx bx-book-bookmark'></i>
                <span class="links-name">Template</span>
            </a>
        </li>
    </ul>
    <div class="px-3 py-2 profile">
        <div class="d-flex align-items-center gap-2">
            <?php if (isset($_SESSION['user']['image'])): ?>
                <img src="<?php echo $_SESSION['user']['image'] ?>" alt="Avatar" class="rounded-circle image" width="34" height="34">
            <?php else: ?>
                <img src="assets/image/default_avatar.png" alt="Avatar" class="rounded-circle image" width="34" height="34">
            <?php endif; ?>
            <div class="name"><?php echo $_SESSION['user']['username'] ?></div>
        </div>
        <a href="?page=logout">
            <i class='bx bx-log-out'></i>
        </a>
    </div>
</div>

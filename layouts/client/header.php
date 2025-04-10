<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isLogin = isset($_SESSION['user']);
$page = $_GET['page'] ?? 'home';
?>

<header class="header fixed">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="w-100 d-flex align-items-center justify-content-between px-5">
            <a class="navbar-brand nav-logo" href="?page=home">Bright</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse py-3 px-5" id="navbarNav">
            <div class="mx-3">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="?page=home">Home</a>
                        <hr class="<?php echo ($page == 'home') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="?page=template">Template</a>
                        <hr class="<?php echo ($page == 'template') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                    <?php if ($isLogin) { ?>
                        <li class="nav-item d-block d-lg-flex">
                            <a class="nav-link" href="?page=my-cv">MyCVs</a>
                            <hr class="<?php echo ($page == 'my-cv') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                        </li>
                    <?php } ?>
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="?page=contact">Contact</a>
                        <hr class="<?php echo ($page == 'contact') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                </ul>
            </div>
            <?php if ($isLogin): ?>
                <div class="btn-group dropstart d-none d-lg-block">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (isset($_SESSION['user']['image'])): ?>
                            <img src="<?php echo $_SESSION['user']['image'] ?>" alt="Avatar" class="img-fluid rounded-circle" width="45" height="45">
                        <?php else: ?>
                            <img src="assets/image/default_avatar.png" alt="Avatar" class="img-fluid rounded-circle" width="45" height="45">
                        <?php endif; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="dropdown-item dropdown-title">Logged in as <strong><?php echo $_SESSION['user']['username'] ?></strong></div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-1 dropdown-content">
                                <i class="fa-solid fa-user"></i>
                                <a class="dropdown-item" href="#">Profile</a>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-1 dropdown-content">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a class="dropdown-item" href="?page=logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <a href="?page=logout" class="button button-sign-out d-lg-none">Log out</a>
            <?php else: ?>
                <a href="?page=login" class="button button-sign-up">Sign In</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

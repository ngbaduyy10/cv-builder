<div class="sidebar py-3 px-1 d-flex flex-column">
    <div class="sidebar-logo px-3">
        <div class="logo">Bright</div>
        <i class="bx bx-menu" id="btn-menu"></i>
    </div>
    <hr class="sidebar-hr" />
    <ul class="sidebar-list d-flex flex-column gap-1">
        <li>
            <a href="?page=user-manage" class="p-3 <?php echo ($_GET['page'] == "user-manage") ? 'active' : ''; ?>">
                <i class="bx bx-user"></i>
                <span class="links-name">User</span>
            </a>
        </li>
        <li>
            <a href="?page=template-manage" class="py-2 px-3 <?php echo ($_GET['page'] == "template-manage") ? 'active' : ''; ?>">
                <i class='bx bx-book-bookmark'></i>
                <span class="links-name">Template</span>
            </a>
        </li>
    </ul>
    <div class="px-3 py-2 profile">
        <div class="d-flex align-items-center gap-2">
            <div class="image">D</div>
            <div class="name">Duy Nguyen</div>
        </div>
        <a href="#">
            <i class='bx bx-log-out'></i>
        </a>
    </div>
</div>

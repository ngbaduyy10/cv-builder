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
    <link rel="stylesheet" href="assets/css/client/layout.css" />
    <link rel="stylesheet" href="assets/css/client/template.css" />
    <title>Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include __DIR__ . '/../../layouts/client/header.php';
?>

<main class="template">
    <div class="w-100">
        <img src="assets/image/banner.jpg" alt="banner" class="img-fluid" />
    </div>
    <div class="my-5">
        <div class="row w-100 mx-0 g-4">
            <div class="col-12 col-lg-2 px-5">
                <div class="border-bottom">
                    <div class="filter pb-3">Filters</div>
                </div>

                <div class="filter-title my-3">Types</div>
                <div id="type-list"></div>
            </div>

            <div class="col-lg-10 col-12 px-5">
                <div class="border-bottom d-flex justify-content-between align-items-center pb-3 row">
                    <div class="filter d-none d-sm-block col-2">Templates</div>
                    <div class="d-flex justify-content-between align-items-center gap-3 col-lg-5 col-md-6 col-sm-8 col-12">
                        <div class="input-group">
                            <input type="search" id="search-box" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle dropdown-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item template-sort" data-sort="price-asc" href="">Price: Low to High</a></li>
                                <li><a class="dropdown-item template-sort" data-sort="price-desc" href="">Price: High to Low</a></li>
                                <li><a class="dropdown-item template-sort" data-sort="rating-asc" href="">Rating: Low to High</a></li>
                                <li><a class="dropdown-item template-sort" data-sort="rating-desc" href="">Rating: High to Low</a></li>
                                <li><a class="dropdown-item template-sort active" data-sort="default" href="">Default</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="template-list mt-4 row g-4 align-items-stretch" id="template-list"></div>
            </div>
        </div>
    </div>
</main>

<?php
include __DIR__ . '/../../layouts/client/footer.php';
?>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="assets/js/client/template.js"></script>

</body>
</html>

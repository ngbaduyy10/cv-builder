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
    <link rel="stylesheet" href="assets/css/client/home.css" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include __DIR__ . '/../../layouts/client/header.php';
?>

<main class="home">
    <div class="hero">
        <div class="container">
            <div class="body row align-items-center">
                <div class="col-6 col-xl-4 media-block d-none d-lg-block">
                    <img
                            src="https://www.livecareer.com/lcapp/uploads/2023/11/cv-format-banner.png"
                            alt="Learn without limits and spread knowledge."
                            class="img"
                    />
                </div>

                <div class="col-lg-6 col-xl-8 col-12 content-block px-5">
                    <h1 class="heading">
                        Craft Your Career Story, Stand Out From Day One.
                    </h1>
                    <p class="desc">
                        Unlock your career potential with our easy-to-use CV builder. Whether you're starting fresh or updating your professional profile, our platform guides you through every step of creating a standout CV that highlights your skills, experience, and achievements. With customizable templates and expert tips, we make job applications a breeze. Start building your future today—no experience needed!
                    </p>
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3 mt-5">
                        <a href="?page=template" class="button button-cta">View Templates</a>
                        <a href="?page=register" class="button button-sign-up">Sign Up</a>
                    </div>
                    <p class="desc mt-5">Recent engagement</p>
                    <p class="desc desc2">
                        <strong>100+</strong>Job Seekers<strong>20+</strong>Templates
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="feature">
        <div class="container">
            <h1 class="title">Get hired fast with a powerful resume</h1>
            <div class="row mt-4 gx-0">
                <div class="col-12 col-md-6 col-xl-4 px-5 py-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="assets/image/feature_1.png" alt="" />
                        </div>
                        <div class="col-10">
                            <div class="label">A better resume in minutes</div>
                            <p class="desc">Tick every box and make sure your resume is never filtered out by the hiring software.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 px-5 py-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="assets/image/feature_2.png" alt="" />
                        </div>
                        <div class="col-10">
                            <div class="label">ATS-friendly templates</div>
                            <p class="desc">Replace your old resume in a few simple clicks. Our builder gives recruiters what they want.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 px-5 py-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="assets/image/feature_3.svg" alt="" />
                        </div>
                        <div class="col-10">
                            <div class="label">Pre-written content</div>
                            <p class="desc">Stop worrying about words. Save time by adding pre-approved, tested content from certified writers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 px-5 py-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="assets/image/feature_4.svg" alt="" />
                        </div>
                        <div class="col-10">
                            <div class="label">Easy with AI</div>
                            <p class="desc">Quickly generate formal phrases and summaries. Sound professional, faster.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 px-5 py-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="assets/image/feature_5.png" alt="" />
                        </div>
                        <div class="col-10">
                            <div class="label">Beat the competition</div>
                            <p class="desc">Our tested resume templates are designed to make you more attractive to recruiters.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 px-5 py-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="assets/image/feature_6.png" alt="" />
                        </div>
                        <div class="col-10">
                            <div class="label">Get paid more</div>
                            <p class="desc">A higher salary begins with a strong resume. Our salary analyzer tells you if your job offer is competitive.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="listing">
        <div class="container">
            <h1 class="title">Our Templates</h1>
            <p class="desc">Choose from a variety of professionally designed CV templates tailored to suit every industry and career level.</p>
            <div class="template-list mt-4 row g-4 align-items-stretch" id="template-list"></div>
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

<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script src="assets/js/client/home.js"></script>

</body>
</html>

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
    <link rel="stylesheet" href="assets/css/client/contact.css" />
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include __DIR__ . '/../../layouts/client/header.php';
?>

<div class="container py-5">
    <div class="row g-4 align-items-center">
        <!-- Form liên hệ -->
        <div class="col-lg-5">
            <div class="contact-form text-white p-5 shadow-lg">
                <h2 class="fw-bold mb-2">Get In Touch</h2>
                <p class="text-white mb-4">Call or email us regarding question or issues</p>
                <form>
                    <div class="mb-4">
                        <input type="text" id="fullName" class="form-control form-control-lg bg-transparent text-white border-0 border-bottom rounded-0" placeholder="Full Name" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" id="email" class="form-control form-control-lg bg-transparent text-white border-0 border-bottom rounded-0" placeholder="Email" required>
                    </div>
                    <div class="mb-4">
                        <textarea id="message" class="form-control form-control-lg bg-transparent text-white border-0 border-bottom rounded-0" rows="3" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-light btn-lg w-100 fw-bold text-dark">SEND</button>
                </form>
                <!-- Social Links for Mobile -->
                <div class="social-links-mobile d-flex justify-content-center gap-4 mt-4">
                    <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="map-container rounded-3 overflow-hidden shadow-lg">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5752336113733!2d106.65769677539957!3d10.767183089381053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f224d181179%3A0x43928509c3f4647f!2sXi%20Grand%20Court%20-%20Block%20A2!5e0!3m2!1sen!2sus!4v1743678323392!5m2!1sen!2sus"
                        class="map-container"
                        allowfullscreen=""
                        loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../../layouts/client/footer.php';
?>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>


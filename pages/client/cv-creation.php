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
    <link rel="stylesheet" href="assets/css/client/cv-creation.css" />
    <title>CV Creation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include __DIR__ . '/../../layouts/client/header.php';
?>

<main class="cv-creation">
    <div class="container row gx-4">
        <section id="about-sc" class="col-12 col-lg-6">
            <form action="" class="cv-form" id = "cv-form">
                <div class = "cv-form-blk">
                    <div class = "cv-form-row-title">
                        <h3>Personal Information</h3>
                    </div>
                    <div class = "cv-form-row cv-form-row-about">
                        <div class = "form-elem">
                            <label for = "" class = "form-label">First Name</label>
                            <input name = "firstname" type = "text" class = "form-control firstname" id = "" onkeyup="" placeholder="e.g. John">
                            <span class="form-text"></span>
                        </div>
                        <div class = "form-elem">
                            <label for = "" class = "form-label">Last Name</label>
                            <input name = "lastname" type = "text" class = "form-control lastname" id = "" onkeyup="" placeholder="e.g. Doe">
                            <span class="form-text"></span>
                        </div>
                        <div class = "form-elem">
                            <label for = "" class = "form-label">Image</label>
                            <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="">
                        </div>
                        <div class = "form-elem">
                            <label for = "" class = "form-label">Address</label>
                            <input name = "address" type = "text" class = "form-control address" id = "" onkeyup="" placeholder="e.g. Lake Street-23">
                            <span class="form-text"></span>
                        </div>
                        <div class = "form-elem">
                            <label for = "" class = "form-label">Email</label>
                            <input name = "email" type = "text" class = "form-control email" id = "" onkeyup="" placeholder="e.g. johndoe@gmail.com">
                            <span class="form-text"></span>
                        </div>
                        <div class = "form-elem">
                            <label for = "" class = "form-label">Phone</label>
                            <input name = "phoneno" type = "text" class = "form-control phoneno" id = "" onkeyup="" placeholder="e.g. 456-768-798, 567.654.002">
                            <span class="form-text"></span>
                        </div>
                        <div class = "form-elem">
                            <label for = "" class = "form-label">Summary</label>
                            <textarea name = "summary" class = "form-control summary" id = "" onkeyup="" rows="4"></textarea>
                            <span class="form-text"></span>
                        </div>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class = "cv-form-row-title">
                        <h3>Achievements</h3>
                    </div>

                    <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-a">
                            <div data-repeater-item>
                                <div class = "cv-form-row cv-form-row-achievement">
                                    <div class = "cols-2">
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Title</label>
                                            <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" onkeyup="">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Description</label>
                                            <textarea name = "achieve_description" class = "form-control achieve_description" rows="4" id = "" onkeyup=""></textarea>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>
                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class = "cv-form-row-title">
                        <h3>Experiences</h3>
                    </div>

                    <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-b">
                            <div data-repeater-item>
                                <div class = "cv-form-row cv-form-row-experience">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Title</label>
                                        <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Company / Organization</label>
                                        <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Start Date</label>
                                        <input name = "exp_start_date" type = "month" class = "form-control exp_start_date" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">End Date</label>
                                        <input name = "exp_end_date" type = "month" class = "form-control exp_end_date" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Description</label>
                                        <textarea name = "exp_description" class = "form-control exp_description" rows="4" id = "" onkeyup=""></textarea>
                                        <span class="form-text"></span>
                                    </div>

                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class = "cv-form-row-title">
                        <h3>Education</h3>
                    </div>

                    <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-c">
                            <div data-repeater-item>
                                <div class = "cv-form-row cv-form-row-experience">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">School</label>
                                        <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Degree</label>
                                        <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Start Date</label>
                                        <input name = "edu_start_date" type = "month" class = "form-control edu_start_date" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">End Date</label>
                                        <input name = "edu_graduation_date" type = "month" class = "form-control edu_graduation_date" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class = "cv-form-row-title">
                        <h3>Projects</h3>
                    </div>

                    <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-d">
                            <div data-repeater-item>
                                <div class = "cv-form-row cv-form-row-experience">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Project Name</label>
                                        <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Description</label>
                                        <textarea name = "proj_description" class = "form-control proj_description" rows="4" id = "" onkeyup=""></textarea>
                                        <span class="form-text"></span>
                                    </div>
                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class = "cv-form-row-title">
                        <h3>Skills</h3>
                    </div>

                    <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-e">
                            <div data-repeater-item>
                                <div class = "cv-form-row cv-form-row-skills">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Skill</label>
                                        <input name = "skill" type = "text" class = "form-control skill" id = "" onkeyup="">
                                        <span class="form-text"></span>
                                    </div>

                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                    </div>
                </div>
            </form>
        </section>

        <section id = "preview-sc" class = "print_area col-12 col-lg-6">
            <div class = "preview-cnt">
                <div class = "preview-cnt-l bg-green text-white">
                    <div class = "preview-blk">
                        <div class = "preview-image">
                            <img src = "" alt = "" id = "image_dsp">
                        </div>
                        <div class = "preview-item preview-item-name">
                            <span class = "preview-item-val fw-6" id = "fullname_dsp"></span>
                        </div>
                        <div class = "preview-item">
                            <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "designation_dsp"></span>
                        </div>
                    </div>

                    <div class = "preview-blk">
                        <div class = "preview-blk-title">
                            <h3>about</h3>
                        </div>
                        <div class = "preview-blk-list">
                            <div class = "preview-item">
                                <span class = "preview-item-val" id = "phoneno_dsp"></span>
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val" id = "email_dsp"></span>
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val" id = "address_dsp"></span>
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val" id = "summary_dsp"></span>
                            </div>
                        </div>
                    </div>

                    <div class = "preview-blk">
                        <div class = "preview-blk-title">
                            <h3>skills</h3>
                        </div>
                        <div class = "skills-items preview-blk-list" id = "skills_dsp">
                            <!-- skills list here -->
                        </div>
                    </div>
                </div>

                <div class = "preview-cnt-r bg-white">
                    <div class = "preview-blk">
                        <div class = "preview-blk-title">
                            <h3>Achievements</h3>
                        </div>
                        <div class = "achievements-items preview-blk-list" id = "achievements_dsp"></div>
                    </div>

                    <div class = "preview-blk">
                        <div class = "preview-blk-title">
                            <h3>educations</h3>
                        </div>
                        <div class = "educations-items preview-blk-list" id = "educations_dsp"></div>
                    </div>

                    <div class = "preview-blk">
                        <div class = "preview-blk-title">
                            <h3>experiences</h3>
                        </div>
                        <div class = "experiences-items preview-blk-list" id = "experiences_dsp"></div>
                    </div>

                    <div class = "preview-blk">
                        <div class = "preview-blk-title">
                            <h3>projects</h3>
                        </div>
                        <div class = "projects-items preview-blk-list" id = "projects_dsp"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php
include __DIR__ . '/../../layouts/client/footer.php';
?>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--jQuery Repeater-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="assets/js/client/repeater.js"></script>
<script src="assets/js/client/cv-creation.js"></script>

</body>
</html>


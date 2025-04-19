<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=login');
    exit();
}

$cv_id = $_GET['cv_id'] ?? null;
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
    <link rel="stylesheet" href="assets/css/client/layout.css" />
    <link rel="stylesheet" href="assets/css/client/cv-creation.css" />
    <title>CV Creation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--html2canvas-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<?php
include __DIR__ . '/../../layouts/client/header.php';
?>

<main class="cv-creation">
    <div class="container row gx-4">
        <div class="col-12 d-flex align-items-center <?php echo $cv_id ? 'justify-content-between' : 'justify-content-start'; ?>">
            <?php if ($cv_id) { ?>
                <div class="d-flex align-items-center gap-3">
                    <label for="template-select" class="template-select">Type</label>
                    <select class="form-select" id="template-select" required></select>
                </div>
            <?php } ?>
            <div class="d-flex align-items-center justify-content-end gap-3">
                <?php if ($cv_id) { ?>
                    <button class="button button-revert d-flex align-items-center gap-2" onclick="revertCV()"  id="revert-cv-btn">
                        <i class='bx bx-redo'></i> Revert
                    </button>
                <?php } ?>
                <button class="button button-save d-flex align-items-center justify-content-center gap-2" onclick="saveCV()"  id="save-cv-btn">
                    <i class='bx bxs-save'></i> Save
                </button>
                <button class="button button-print d-flex align-items-center gap-2" onclick="printCV()">
                    <i class='bx bxs-printer'></i> Print
                </button>
            </div>
        </div>
        <div class="col-12 d-flex gap-4 flex-column flex-xl-row align-items-center align-items-xl-start">
            <section id="about-sc" class="custom-width">
                <form action="" class="cv-form" id = "cv-form">
                    <div class = "form-elem">
                        <label for = "" class = "form-label">CV Name</label>
                        <input name = "cvname" type = "text" class = "form-control cvname" id = "">
                        <span class="form-text"></span>
                    </div>
                    <div class = "cv-form-blk">
                        <div class = "cv-form-row-title">
                            <h3>Personal Information</h3>
                        </div>
                        <div class = "cv-form-row cv-form-row-about">
                            <div class = "form-elem">
                                <label for = "" class = "form-label">First Name</label>
                                <input name = "firstname" type = "text" class = "form-control firstname" id = "" oninput="generateCV()" placeholder="e.g. John">
                                <span class="form-text"></span>
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Last Name</label>
                                <input name = "lastname" type = "text" class = "form-control lastname" id = "" oninput="generateCV()" placeholder="e.g. Doe">
                                <span class="form-text"></span>
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Image</label>
                                <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="previewImage()">
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Job</label>
                                <input name = "job" type = "text" class = "form-control job" id = "" oninput="generateCV()" placeholder="e.g. Fresher">
                                <span class="form-text"></span>
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Address</label>
                                <input name = "address" type = "text" class = "form-control address" id = "" oninput="generateCV()" placeholder="e.g. 23 Lake Street">
                                <span class="form-text"></span>
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Email</label>
                                <input name = "email" type = "text" class = "form-control email" id = "" oninput="generateCV()" placeholder="e.g. johndoe@gmail.com">
                                <span class="form-text"></span>
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Phone</label>
                                <input name = "phoneno" type = "text" class = "form-control phoneno" id = "" oninput="generateCV()" placeholder="e.g. 0827872272">
                                <span class="form-text"></span>
                            </div>
                            <div class = "form-elem">
                                <label for = "" class = "form-label">Objectives</label>

                                <div class="toolbar">
                                    <div class="btn-toolbar">
                                        <button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
                                        <button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline'></i></button>
                                        <button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>
                                        <button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>
                                        <button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'></i></button>
                                    </div>
                                </div>

                                <div id="summary-content" class="editor-content" contenteditable="true" spellcheck="false"></div>
                                <textarea name = "summary" class = "form-control summary d-none" id = "" oninput="generateCV()" rows="6"></textarea>
                                <span class="form-text"></span>
                            </div>
                        </div>
                    </div>

                    <div class="cv-form-blk achievement-data">
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
                                                <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" oninput="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Description</label>

                                                <div class="toolbar">
                                                    <div class="btn-toolbar">
                                                        <button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
                                                        <button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline'></i></button>
                                                        <button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>
                                                        <button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>
                                                        <button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'></i></button>
                                                    </div>
                                                </div>

                                                <div id="achievement-content" class="editor-content" contenteditable="true" spellcheck="false"></div>
                                                <textarea name = "achieve_description" class = "form-control achieve_description d-none" rows="3" id = "" oninput="generateCV()"></textarea>
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

                    <div class="cv-form-blk experience-data">
                        <div class = "cv-form-row-title">
                            <h3>Experiences</h3>
                        </div>

                        <div class = "row-separator repeater">
                            <div class = "repeater" data-repeater-list = "group-b">
                                <div data-repeater-item>
                                    <div class = "cv-form-row cv-form-row-experience">
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Title</label>
                                            <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" oninput="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Company / Organization</label>
                                            <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" oninput="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Start Date</label>
                                            <input name = "exp_start_date" type = "date" class = "form-control exp_start_date" id = "" onchange="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">End Date</label>
                                            <input name = "exp_end_date" type = "date" class = "form-control exp_end_date" id = "" onchange="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Description</label>
                                            <div class="toolbar">
                                                <div class="btn-toolbar">
                                                    <button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
                                                    <button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline'></i></button>
                                                    <button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>
                                                    <button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>
                                                    <button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'></i></button>
                                                </div>
                                            </div>

                                            <div id="experience-content" class="editor-content" contenteditable="true" spellcheck="false"></div>
                                            <textarea name = "exp_description" class = "form-control exp_description d-none" rows="6" id = "" oninput="generateCV()"></textarea>
                                            <span class="form-text"></span>
                                        </div>

                                        <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                        </div>
                    </div>

                    <div class="cv-form-blk education-data">
                        <div class = "cv-form-row-title">
                            <h3>Education</h3>
                        </div>

                        <div class = "row-separator repeater">
                            <div class = "repeater" data-repeater-list = "group-c">
                                <div data-repeater-item>
                                    <div class = "cv-form-row cv-form-row-experience">
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">School</label>
                                            <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" oninput="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Degree</label>
                                            <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" oninput="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Start Date</label>
                                            <input name = "edu_start_date" type = "date" class = "form-control edu_start_date" id = "" onchange="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">End Date</label>
                                            <input name = "edu_graduation_date" type = "date" class = "form-control edu_graduation_date" id = "" onchange="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                        </div>
                    </div>

                    <div class="cv-form-blk project-data">
                        <div class = "cv-form-row-title">
                            <h3>Projects</h3>
                        </div>

                        <div class = "row-separator repeater">
                            <div class = "repeater" data-repeater-list = "group-d">
                                <div data-repeater-item>
                                    <div class = "cv-form-row cv-form-row-experience">
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Project Name</label>
                                            <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" oninput="generateCV()">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Description</label>
                                            <div class="toolbar">
                                                <div class="btn-toolbar">
                                                    <button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
                                                    <button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline'></i></button>
                                                    <button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>
                                                    <button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>
                                                    <button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'></i></button>
                                                </div>
                                            </div>

                                            <div id="project-content" class="editor-content" contenteditable="true" spellcheck="false"></div>
                                            <textarea name = "proj_description" class = "form-control proj_description d-none" rows="6" id = "" oninput="generateCV()"></textarea>
                                            <span class="form-text"></span>
                                        </div>
                                        <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                        </div>
                    </div>

                    <div class="cv-form-blk skill-data">
                        <div class = "cv-form-row-title">
                            <h3>Skills</h3>
                        </div>

                        <div class = "row-separator repeater">
                            <div class = "repeater" data-repeater-list = "group-e">
                                <div data-repeater-item>
                                    <div class = "cv-form-row cv-form-row-skills">
                                        <div class = "form-elem">
                                            <label for = "" class = "form-label">Skill</label>
                                            <input name = "skill" type = "text" class = "form-control skill" id = "" oninput="generateCV()">
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

            <section id = "preview-sc" class = "print_area custom-width"></section>
        </div>
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

<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script src="assets/js/client/repeater.js"></script>
<script src="assets/js/client/cv-creation.js"></script>

</body>
</html>


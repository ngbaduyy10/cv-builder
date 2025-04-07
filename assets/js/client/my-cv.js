$(document).ready(function () {
    const get_cv = () => {
        $.ajax({
            url: "api/cv.api.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_cv",
            },
            success: function (response) {
                if (response.success) {
                    if (response.data.length === 0) {
                        $('#cv-list').html(`
                            <div class="col-12 notice">
                                <div class="text-center">
                                    <h4>No CVs Found</h4>
                                    <p>You haven't created any CVs yet. Click the button below to create your first CV.</p>
                                    <a href="?page=template" class="btn btn-primary">Create CV</a>
                                </div>
                            </div>
                        `);
                    } else {
                        $('#cv-list').empty();
                        response.data.forEach((cv) => {
                            let cvHtml = `
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="cv-item p-4 h-100 d-flex flex-column">
                                        <img src="${cv.cv_image}" alt="${cv.cvname}" />
                                        <a href="?page=cv-creation&template_id=${cv.template_id}&cv_id=${cv.id}" class="button button-edit">
                                            <i class='bx bxs-edit-alt'></i>
                                        </a>
                                        <button class="button button-delete" id="button-delete" data-cv-id="${cv.id}">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                        <div class="mt-3 detail">
                                            <h3 class="title">${cv.cvname}</h3>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class='bx bx-book-bookmark'></i>
                                                <p class="desc">${cv.template_name}</p>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class='bx bx-time-five'></i>
                                                <p class="desc">Created at ${cv.created_at}</p>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class='bx bx-cloud-upload' ></i>
                                                <p class="desc">Last updated at ${cv.updated_at}</p>
                                            </div>
                                        </div>
                                        <button class="button button-public mt-4" id="button-public" data-cv-id="${cv.id}" data-cv-public="${cv.is_public}">${cv.is_public ? "Private CV" : "Public CV"}</button>
                                        <button class="button button-copy-url mt-2 ${cv.is_public ? "" : "d-none"}" data-cv-id="${cv.id}">Copy CV URL</button>
                                    </div>
                                </div>
                            `;

                            $('#cv-list').append(cvHtml);
                        })
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading templates:", error);
            }
        });
    }
    get_cv();

    $(document).on('click', '#button-delete', function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0179FE",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            customClass: {
                popup: 'custom-swal-size'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                let cv_id = $(this).data('cv-id');
                $.ajax({
                    url: "api/cv.api.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        action: "delete_cv",
                        id: cv_id,
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Your CV has been deleted!",
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: {
                                    popup: 'custom-swal-size',
                                }
                            });
                            setTimeout(() => {
                                get_cv();
                            }, 1500);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error deleting cv:", error);
                    }
                });
            }
        });
    });

    //copy url
    $(document).on('click', '.button-copy-url', function () {
        const cvId = $(this).data('cv-id');
        const cvUrl = `${window.location.origin}/cv-builder/cv.php?id=${cvId}`;
        navigator.clipboard.writeText(cvUrl).then(() => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'CV URL copied to clipboard!',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                customClass: {
                    popup: 'toast-size',
                }
            });
        }).catch(err => {
            console.error('Error copying URL:', err);
        });
    });

    //change public status
    $(document).on('click', '#button-public', function () {
        const cv_id = $(this).data('cv-id');
        const is_public = $(this).data('cv-public');
        console.log(cv_id, is_public);
        $.ajax({
            url: "api/cv.api.php",
            method: "POST",
            dataType: "json",
            data: {
                action: "change_public_status",
                id: cv_id,
                status: !is_public,
            },
            success: function (response) {
                if (response.success) {
                    get_cv();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: `CV is now ${!is_public ? "Public" : "Private"}`,
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 3000,
                        customClass: {
                            popup: 'toast-size',
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error changing public status:", error);
            }
        });
    });
});
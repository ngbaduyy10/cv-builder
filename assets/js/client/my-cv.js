$(document).ready(function () {
    const get_cv = () => {
        $.ajax({
            url: "/cv-builder/api/cv.api.php",
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
                        response.data.forEach((cv) => {
                            let cvHtml = `
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="cv-item p-4 h-100 d-flex flex-column">
                                        <img src="${cv.preview_image}" alt="" class="w-100" />
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
                    url: "/cv-builder/api/cv.api.php",
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
                                window.location.reload();
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
});
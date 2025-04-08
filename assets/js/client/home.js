$(document).ready(function () {
    let isLogin = false;
    let maxCVReached = false;
    $.ajax({
        url: "api/auth.api.php",
        method: "GET",
        dataType: "json",
        data: {
            action : "auth_check"
        },
        success: function (response) {
            if (response.success) {
                isLogin = true;
            }
        },
        error: function (xhr, status, error) {
            console.error("Error checking authentication:", error);
        }
    })

    $.ajax({
        url: "api/cv.api.php",
        method: "GET",
        dataType: "json",
        data: {
            action: "get_cv",
        },
        success: function (response) {
            if (response.success) {
                if (response.data.length >= 3) {
                    maxCVReached = true;
                }
            }
        },
    });

    $.ajax({
        url: "api/template.api.php",
        method: "GET",
        dataType: "json",
        data: {
            action: "get_ex_template",
        },
        success: function (response) {
            if (response.success) {
                $('#template-list').empty();

                response.data.forEach((template) => {
                    let templateHtml = `
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="template-item p-4 h-100 d-flex flex-column">
                                    <img src="${template.preview_image}" alt="" class="w-100" />
                                    <button id="use-template" data-id="${template.id}" class="button button-use-template">Use Template</button>
                                    <div class="mt-3">
                                        <h3 class="title">${template.name}</h3>
                                        <p class="desc">${template.description}</p>
                                    </div>
                                </div>
                            </div>
                        `;

                    $('#template-list').append(templateHtml);
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error loading templates:", error);
        }
    });

    $(document).on("click", "#use-template", function (e) {
        e.preventDefault();
        if (!isLogin) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: "warning",
                title: "Please login to use this template",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                customClass: {
                    popup: 'toast-size',
                }
            });
        } else if (maxCVReached) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: "warning",
                title: "You have reached the maximum number of CVs",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                customClass: {
                    popup: 'toast-size',
                }
            });
        } else {
            const template_id = $(this).data("id");
            window.location.href = `index.php?page=cv-creation&template_id=${template_id}`;
        }
    });
});
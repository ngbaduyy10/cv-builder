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
                console.log(response.data);
                if (response.success) {
                    response.data.forEach((cv) => {
                        let cvHtml = `
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="cv-item p-4 h-100 d-flex flex-column">
                                    <img src="${cv.preview_image}" alt="" class="w-100" />
                                    <a href="#" class="button button-edit">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <a href="#" class="button button-delete">
                                        <i class='bx bx-trash'></i>
                                    </a>
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
            },
            error: function (xhr, status, error) {
                console.error("Error loading templates:", error);
            }
        });
    }
    get_cv();
});
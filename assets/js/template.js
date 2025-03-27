$(document).ready(function () {
    const getTemplate = () => {
        $.ajax({
            url: "/cv-builder/api/template.api.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_templates",
            },
            success: function (response) {
                if (response.success) {
                    response.data.forEach((template) => {
                        let templateHtml = `
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="template-item p-4 h-100 d-flex flex-column">
                                    <img src="${template.preview_image}" alt="" class="w-100" />
                                    <a href="#" class="button button-use-template">Use Template</a>
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
    }

    getTemplate();
});
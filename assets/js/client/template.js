$(document).ready(function () {
    let filters = {
        sort: null,
        keyword: null,
        type: null
    }
    const getTemplate = () => {
        $.ajax({
            url: "/cv-builder/api/template.api.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_templates",
                ...filters
            },
            success: function (response) {
                if (response.success) {
                    $('#template-list').empty();

                    response.data.forEach((template) => {
                        let templateHtml = `
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="template-item p-4 h-100 d-flex flex-column">
                                    <img src="${template.preview_image}" alt="" class="w-100" />
                                    <a href="?page=cv-creation&template_id=${template.id}" class="button button-use-template">Use Template</a>
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

    $(".template-sort").click(function (e) {
        e.preventDefault();

        filters.sort = $(this).data("sort");
        getTemplate();

        $(".template-sort").removeClass("active");
        $(this).addClass("active");
    });

    $("#search-box").on("keyup", function () {
        filters.keyword = $(this).val();
        getTemplate();
    });

    const getType = () => {
        $.ajax({
            url: "/cv-builder/api/type.api.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_types",
            },
            success: function (response) {
                if (response.success) {
                    $('#type-list').empty();

                    response.data.forEach((type) => {
                        let typeHtml = `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="${type.id}" id="${type.title}">
                                <label class="form-check-label" for="${type.title}">
                                    ${type.title}
                                </label>
                            </div>
                        `;

                        $('#type-list').append(typeHtml);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading templates:", error);
            }
        });
    }
    getType();

    $('#type-list').on('change', '.form-check-input', function() {
        let selectedTypes = [];
        $('#type-list .form-check-input:checked').each(function() {
            selectedTypes.push($(this).val());
        });

        if (selectedTypes.length > 0) {
            filters.type = selectedTypes.join(',');
        } else {
            filters.type = null;
        }

        getTemplate();
    });
});
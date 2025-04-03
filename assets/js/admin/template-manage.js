$(document).ready(function() {
    let filters = {
        keyword: null,
        sort: null,
        type: null,
    }
   const load_templates = () => {
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="template-item p-4 h-100 d-flex flex-column">
                                    <img src="${template.preview_image}" alt="" class="w-100" />
                                    <a href="?page=template-create&template-id=${template.id}" class="button button-edit">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <button class="button button-delete" data-id="${template.id}">
                                        <i class='bx bx-trash'></i>
                                    </button>
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
    load_templates();

    //delete template
    $('#template-list').on('click', '.button-delete', function() {
        const templateId = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            customClass: {
                popup: 'custom-swal-size',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/cv-builder/api/template.api.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        action: "delete_template",
                        id: templateId
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Created Template Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: {
                                    popup: 'custom-swal-size',
                                }
                            });

                            load_templates();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting template:", error);
                    }
                });
            }
        });
    });
});
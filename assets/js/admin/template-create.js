import { uploadToCloudinary } from "../uploadToCloud.js";

$(document).ready(function() {
    //get data by id
    const urlParams = new URLSearchParams(window.location.search);
    const templateId = urlParams.get('template_id');

    if (templateId) {
        $.ajax({
            url: "api/template.api.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_template_by_id",
                id: templateId
            },
            success: function (response) {
                if (response.success) {
                    const template = response.data;
                    $('#template-name').val(template.name);
                    $('#template-description').val(template.description);
                    setTimeout(() => {
                        $('#template-type').val(template.type_id);
                    }, 100);
                    $('#preview-image').attr('src', template.preview_image);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading template:", error);
            }
        });
    }

    $.ajax({
        url: "api/type.api.php",
        method: "GET",
        dataType: "json",
        data: {
            action: "get_types"
        },
        success: function (response) {
            if (response.success) {
                response.data.forEach((type) => {
                     $('#template-type').append(`
                          <option value="${type.id}">${type.title}</option>
                     `);
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error loading types:", error);
        }
    });

    //preview image
    $('#template-image').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    //submit form
    $('#template-form').on('submit', async function(e) {
        e.preventDefault();
        //set loading for button
        $('#template-form button').html('<i class="fa-solid fa-spinner fa-spin"></i>');
        $('#template-form button').attr('disabled', 'disabled');

        let previewImage = $('#preview-image').attr('src');
        const file = $('#template-image')[0].files[0];
        if (file) {
            previewImage = await uploadToCloudinary(file);
        }

        const data = {
            action: templateId ? "update_template" : "create_template",
            id: templateId,
            name: $('#template-name').val(),
            description: $('#template-description').val(),
            type_id: $('#template-type').val(),
            preview_image: previewImage
        }

        $.ajax({
            url: "api/template.api.php",
            method: "POST",
            dataType: "json",
            data: data,
            success: function(response) {
                //reset button
                $('#template-form button').html(templateId ? 'Update' : 'Create');
                $('#template-form button').removeAttr('disabled');

                if (response.success) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'custom-swal-size',
                        }
                    });
                    setTimeout(() => {
                        window.location.href = 'index.php?page=template-manage';
                    }, 1500);
                } else {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 2000,
                        customClass: {
                            popup: 'toast-size',
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error creating template:", error);
            }
        });
    });
});
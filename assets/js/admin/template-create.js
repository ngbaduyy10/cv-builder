$(document).ready(function() {
    $.ajax({
        url: "/cv-builder/api/type.api.php",
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
        const file = $('#template-image')[0].files[0];
        const previewImage = await uploadToCloudinary(file);

        const data = {
            action: "create_template",
            name: $('#template-name').val(),
            description: $('#template-description').val(),
            type_id: $('#template-type').val(),
            preview_image: previewImage
        }

        $.ajax({
            url: "/cv-builder/api/template.api.php",
            method: "POST",
            dataType: "json",
            data: data,
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
                    setTimeout(() => {
                        window.location.href = '/cv-builder/index.php?page=template-manage';
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

const uploadToCloudinary = async (file) => {
    let imageUrl = "";
    let formData = new FormData();
    formData.append('file', file);
    formData.append('upload_preset', 'cv_avatar');

    await $.ajax({
        url: `https://api.cloudinary.com/v1_1/doxm7rnpk/upload`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            imageUrl = response.secure_url;
        },
        error: function(error) {
            console.error("Error uploading image:", error);
        }
    });

    return imageUrl;
}
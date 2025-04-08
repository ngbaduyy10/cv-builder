export const uploadToCloudinary = async (file) => {
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
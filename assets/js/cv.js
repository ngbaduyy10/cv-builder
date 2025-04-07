$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const cvId = urlParams.get('id');
    //get_public_cv
    $.ajax({
        url: "api/cv.api.php",
        method: "GET",
        dataType: "json",
        data: {
            action: "get_public_cv",
            id: cvId
        },
        success: function (response) {
            if (response.success) {
                $("#cv-image").attr("src", response.data);
            } else {
                window.location.href = "/cv-builder/index.php?page=404";
            }
        }
    });
})
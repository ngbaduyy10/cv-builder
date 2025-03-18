$(document).ready(function() {
    $("#btn-menu").click(function () {
        $("#admin-content").toggleClass("closed");
    });

    function load_users() {
        $.ajax({
            url: "/cv-builder/api/user.api.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_users",
            },
            success: function(response) {
                if (response.data.length > 0) {
                    response.data.forEach((user, index) => {
                        let userHtml = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>
                                    ${user.image ? `<img src="${user.image}" />` : 'No Image'}
                                </td>
                                <td>${user.username}</td>
                                <td>${user.email}</td>
                                <td>${user.role.toUpperCase()}</td>
                                <td><button>View</button></td>
                            </tr>
                        `;
                        $('#users-list').append(userHtml);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading users:", error);
            }
        });
    }
    load_users();
});
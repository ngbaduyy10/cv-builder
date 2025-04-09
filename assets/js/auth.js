import { showToast } from "./toast.js";
$(document).ready(function () {
    $("#register-form").submit(function (e) {
        //set loading for button
        $("#register-form button").html('<i class="fa-solid fa-spinner fa-spin"></i>');
        $("#register-form button").attr("disabled", "disabled");
        e.preventDefault();

        const username = $("#username").val();
        const password = $("#password").val();
        const email = $("#email").val();

        $.ajax({
            url: "api/auth.api.php",
            method: "POST",
            dataType: "json",
            data: {
                action: "register",
                username,
                password,
                email,
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = "index.php?page=home";
                } else {
                    showToast("error", response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error registering user:", error);
            }
        })
    })

    $("#login-form").submit(function (e) {
        e.preventDefault();
        //set loading for button
        $("#login-form button").html('<i class="fa-solid fa-spinner fa-spin"></i>');
        $("#login-form button").attr("disabled", "disabled");

        const email = $("#email").val();
        const password = $("#password").val();

        $.ajax({
            url: "api/auth.api.php",
            method: "POST",
            dataType: "json",
            data: {
                action: "login",
                email,
                password,
            },
            success: function (response) {
                if (response.success) {
                    if (response.user.role === "admin") {
                        window.location.href = "index.php?page=user-manage";
                    } else {
                        window.location.href = "index.php?page=home";
                    }
                } else {
                    showToast("error", response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error logging in user:", error);
            }
        })
    })
})
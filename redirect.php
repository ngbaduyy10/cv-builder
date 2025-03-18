<?php
require 'config/googleAuth.php';
require 'config/auth.php';

$google = new GoogleAuth();
if (isset($_GET['code'])) {
    $google->authenticate($_GET['code']);
    $user = $google->getUserInfo();

    $username = $user->name;
    $email = $user->email;
    $image = $user->picture;
    $password = password_hash("123456", PASSWORD_DEFAULT);

    $result = (new Auth())->googleLogin($email, $username, $image, $password);
    if ($result['success']) {
        header('Location: index.php?page=home');
    } else {
        echo $result['message'];
    }

} else {
    header('Location: ' . $google->getAuthUrl());
}

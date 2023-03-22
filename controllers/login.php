<?php

if (isset($_SESSION['username'])) {
    header('location: /account');
    die();
}

view("login.view.php", [
    'heading' => 'Login',
    'errors' => [],
]);

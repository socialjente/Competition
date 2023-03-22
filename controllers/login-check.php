<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Validate input data
$db = App::resolve(Database::class);
$userName = trim(htmlspecialchars($_POST['username'] ?? ''));
$password = trim(htmlspecialchars($_POST['password'] ?? ''));
$errors = [];

// if the given Username is not in the database, display error
if (!Validator::exists($db, $userName)) {
    $errors['username'] = 'Username is incorrect.';
}

// if the given Username has less than 3 characters, display error
if (!Validator::length($userName)) {
    $errors['username'] = 'Username should be at least 3 characters long.';
}

// if the given Password does not equal the Username's password, display error
if (!Validator::correct($db, $userName, $password)) {
    $errors['password'] = 'Password is incorrect.';
}

// if the given Password has less than 3 characters, display error
if (!Validator::length($password)) {
    $errors['password'] = 'Password should be at least 3 characters long.';
}

// if there are any Username errors, display no Password error
if (!empty($errors['username'])) {
    $errors['password'] = '';
}

// if Cookie Lock is set, and Username exists in DB -> if Username !== lock, display errors
if (!empty($_COOKIE['lock']) && empty($errors['username']) && Validator::unlock($_COOKIE['lock']) !== $userName) {
    $errors['username'] = "<b>" . Validator::unlock($_COOKIE['lock']) . "</b> you miscreant! That is <b>NOT</b> your account!";
    $errors['password'] = "Even if you knew <b>" . $_POST['username'] . "'s</b> password, it would <b>NEVER</b> work.";
}

// If there are errors, stay on the /login page and display the errors. (Do not go the URL /account)
if (!empty($errors)) {
    view('login.view.php', [
        'heading' => 'Login',
        'errors' => $errors,
    ]);
    die();
}

// If there are NO errors, and password is the default password. Then redirect to the change my password-page
if (empty($errors) && $password === "Password1234") {
    $nothing = 0; // gonna do this coding part last. First I have to do some styling!
}

// If there are NO errors, set session variables and cookies. Then redirect to the protected page
if (empty($errors)) {
    $_SESSION['username'] = $userName;
    $_SESSION['password'] = $password;
    setcookie('username', $userName, time() + 86400, '/', '', false, true);

    if (!isset($_COOKIE['lock'])) {
        setcookie('lock', (Validator::lock($userName)), time() + 86400, '/', '', false, true);
    }

    header('Location: /account');
    die();
}

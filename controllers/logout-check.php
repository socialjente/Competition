<?php

unset($_SESSION['username']);
unset($_SESSION['password']);
setcookie('username', '', time() - 3600);

header('location: /login');
die();

<?php

$router->get('/', 'controllers/landing.php');
$router->get('/about', 'controllers/about.php');
$router->get('/results', 'controllers/results.php');
$router->get('/login', 'controllers/login.php');
$router->get('/account', 'controllers/account.php');

// Login Check
$router->login('/login', 'controllers/login-check.php');

// Logout Check
$router->logout('/login', 'controllers/logout-check.php');
$router->delete('/login', 'controllers/logout-unlock.php');




// Change Password






// Notes routes
$router->get('/notes', 'controllers/notes/index.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/note', 'controllers/notes/show.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->get('/notes/create', 'controllers/notes/create.php');

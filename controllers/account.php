<?php

use Core\App;
use Core\Database;

if (!isset($_SESSION['username'])) {
    header('location: /login');
    die();
}

$user = $_SESSION['username'];

$db = App::resolve(Database::class);

$myChair = $db->query("SELECT * FROM chairs WHERE user_name = ?", [$_SESSION['username']])->find();

$ranks = $db->query("SELECT row_number() OVER (ORDER BY rating_final DESC) row_num, user_name FROM chairs ORDER BY rating_final DESC;")->get();

foreach ($ranks as $rank) {
    if ($rank["user_name"] === $_SESSION['username']) {
        $myRank = ordinal($rank["row_num"]);
    }
}



view("account.view.php", [
    'heading' => "$user's Workstation",
    'myChair' => $myChair,
    'myRank' => $myRank
]);

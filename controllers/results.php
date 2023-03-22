<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$winners = $db->query('SELECT row_number() OVER (ORDER BY rating_final DESC) row_num, user_name, rating_final, image, text_desk, text_chair, text_setup, text_extra FROM chairs ORDER BY rating_final DESC LIMIT 3')->get();

$mentions = $db->query('SELECT c.user_name, c.text_extra FROM chairs c INNER JOIN chairs d ON c.user_name = d.user_name AND c.text_extra IS NOT NULL')->get();


view("results.view.php", [
    'heading' => 'Competition Results',
    'winners' => $winners,
    'mentions' => $mentions,
]);

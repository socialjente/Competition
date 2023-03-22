<?php

setcookie('lock', '', time() - 3600);
setcookie('PHPSESSID', '', time() - 3600);

header('location: /login');
die();

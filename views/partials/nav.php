<?php

use Core\Validator; ?>

<nav class="blueG">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <!-- Landing page -->
                <div class="flex-shrink-0">
                    <a href="/"><img class="h-8 w-8 rounded-full" src="images/site/navbar-icon.jpg" alt="Moi face"></a>
                </div>
                <!-- Navbar -->
                <div class="md:block">
                    <div class="ml-5 flex items-baseline space-x-4">
                        <a href="/about" class="<?= urlIs('/about') ? 'yellowG blueFont' : 'yellowFont' ?> hover:bg-blue-900 hover:text-white px-2 py-1 rounded-md text-sm font-bold">About</a>
                        <a href="/results" class="<?= urlIs('/results') ? 'yellowG blueFont' : 'yellowFont' ?> hover:bg-blue-900 hover:text-white px-2 py-1 rounded-md text-sm font-bold">Results</a>
                        <!-- Login/My Workstation. State 1) User NOT logged in, displays "Login" and links to /login. State 2) User is logged in, it displays "Account" and links to /account. -->
                        <a href="<?= isset($_SESSION['username']) ? '/account' : '/login' ?>" class="<?= (urlIs('/account') or urlIs('/login')) ? 'yellowG blueFont' : 'yellowFont' ?> hover:bg-blue-900 hover:text-white px-2 py-1 rounded-md text-sm font-bold"><?= (isset($_SESSION['username'])) ? $_SESSION['username'] : "Login" ?></a>
                        <!-- Logout. Only visible if User is logged in -->
                        <?php if (isset($_SESSION['username'])) : ?>
                            <form method="POST" action="/login">
                                <input type="hidden" name="_method" value="LOGOUT">
                                <input type="submit" value="Log Out" class="bg-red-800 text-white hover:bg-red-700 hover:text-white px-2 py-1 rounded-md text-sm font-bold">
                            </form>
                            <?php endif; ?>

                            <!-- Remove $_COOKIE['lock'] -->
                        <?php if (isset($_COOKIE['lock']) && !isset($_SESSION['username'])) : ?>
                            <form method="POST" action="/login">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="<?= strip_tags(Validator::unlock($_COOKIE['lock'])) ?>" class="bg-red-800 text-white hover:bg-red-700 hover:text-white px-2 py-1 text-sm font-bold">
                            </form>
                        <?php endif; ?>
                        <!-- Notes -->
                        <!-- <a href="/notes" class="ml-10 <?= urlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:text-white px-2 py-1 rounded-md text-sm font-bold"><del>Notes</del></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
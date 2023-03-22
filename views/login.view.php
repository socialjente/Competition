<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main class="mx-auto max-w-7xl p-6">
    <div>
        <p>Log in to see your workstation's page.</p>
        <div class="my-3">
            <?php if (!isset($_COOKIE['lock'])) : ?>
                <p>The Identity Verification System is light(ning-fast). So please be good and use your own name to log in.</p>
            <?php elseif (isset($_COOKIE['lock'])) : ?>
                <p>The Identity Verification System has become <b class="text-red-500">all powerful</b>. So don't even think about trying out someone elses account! Consider yourself warned! <b>Moehahahahahahahahahahaha</b></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Login Form -->
    <div class="md:grid md:grid-cols-3 md:gap-6 mt-5 md:col-span-2 md:mt-0">
        <form method="POST" action="/login">
            <input type="hidden" name="_method" value="LOGIN">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Firstname" value="<?= $_SESSION['username'] ?? $_POST['username'] ?? '' ?>">
            <?php if (isset($errors['username'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['username'] ?></p>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="text" id="password" name="password" placeholder="Password1234" required value="<?= $_SESSION['password'] ?? $_POST['password'] ?? 'Password1234' ?>">
            <?php if (isset($errors['password'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
            <?php endif; ?>

            <button type="submit" class="mt-3 rounded-md bg-indigo-600 py-2 px-4 text-sm font-medium text-white">Login</button>
        </form>
    </div>
    <div>
        <p class="mb-3">Don't have an account? Create one <a href="https://en.wikipedia.org/wiki/Feature_creep" target="_blank" class="text-blue-500 underline">here</a>.</p>
        <p>If you forgot your password, please contact Pepijn. And if you want to have your password reset, also contact Jente.</p>
    </div>

    <div>
    </div>

</main>

<?php require('partials/footer.php') ?>
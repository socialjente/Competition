<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main class="mx-auto max-w-7xl p-6">

    <div id="overlay" onclick="off()">
        <div id="text">
            <p class="mb-2" style="text-align: center; font-size: 20px"><b><span id="winner-name"></span>'s Workstation</b></p>
            <p class="my-2"><b>Chair: </b><span id="chair-name"></span></p>
            <p class="my-2"><b>Setup: </b><span id="setup-text"></span></p>
            <p class="mt-2"><b>Desk: </b><span id="desk-text"></span></p>
        </div>
    </div>

    <div id="overlay2" onclick="off()">
        <div id="text">
            <h1 style="text-align: center"><b>Dishonorable Mentions</b></h1>
            <?php foreach ($mentions as $mention) : ?><p class="mt-4"><b><?= $mention['user_name'] . "</b>" . $mention['text_extra'] ?></p><?php endforeach; ?>
        </div>
    </div>

    <div class="mb-3">
        <p>Click any image to read its full review!</p>
    </div>

    <div class="mb-6">
        <h1><b>First Place</b> goes to... <b><?= $winners["0"]["user_name"] ?></b>! Score: <b><?= $winners["0"]["rating_final"] ?></b></h1>
        <button onclick="details(index = 0)"><img src="<?= $winners["0"]["image"] ?>" alt="<?= $winners["0"]["user_name"] ?>'s Chair" width="320" height="180" /></button>
    </div>

    <div class="my-6">
        <h1><b>Second Place</b> goes to... <b><?= $winners["1"]["user_name"] ?></b>! Score: <b><?= $winners["1"]["rating_final"] ?></b></h1>
        <button onclick="details(index = 1)"><img src="<?= $winners["1"]["image"] ?>" alt="<?= $winners["1"]["user_name"] ?>'s Chair" width="320" height="180" /></button>
    </div>

    <div class="my-6">
        <h1><b>Third Place</b> goes to... <b><?= $winners["2"]["user_name"] ?></b>! Score: <b><?= $winners["2"]["rating_final"] ?></b></h1>
        <button onclick="details(index = 2)"><img src="<?= $winners["2"]["image"] ?>" alt="<?= $winners["2"]["user_name"] ?>'s Chair" width="320" height="180" /></button>
    </div>

    <div class="my-6">
        <h1>There were also some ignoble entries. To read about those, click the button.</h1>
        <button onclick="shame()" class="button"><b>Dishonorable Mentions</b></button>
    </div>

    <div class="mt-6">
        <p>Don't forget to click the images to read about these workstations! If you want to read about your own workstation, you can log in by clicking 'Login' in the navigation bar. After you have logging in, click the photo of your workstation. Enjoy the read!</p>
    </div>

    <script>
        var winners = <?php echo json_encode($winners); ?>;

        var overlay = document.getElementById("overlay");
        var winnerName = document.getElementById("winner-name");
        var chairName = document.getElementById("chair-name");
        var setupText = document.getElementById("setup-text");
        var deskText = document.getElementById("desk-text");

        function details(index) {
            console.log("on function is executed!");

            overlay.style.display = "block";
            winnerName.innerHTML = winners["" + (index) + ""]['user_name'];
            chairName.innerHTML = winners["" + (index) + ""]['text_chair'];
            setupText.innerHTML = winners["" + (index) + ""]['text_setup'];
            deskText.innerHTML = winners["" + (index) + ""]['text_desk'];
        }

        function shame() {
            document.getElementById("overlay2").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("overlay2").style.display = "none";
        }
    </script>

</main>

<?php require('partials/footer.php') ?>
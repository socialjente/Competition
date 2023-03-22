<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl p-6">

        <p class="mb-5">You must be dying to read the judge's description, ChatGTP's score, and of course how high a rank you achieved in the competition!<br>If so, click the image of your workstation^^</p>

        <div id="overlay2" onclick="off2()">
            <div id="text2" style="text-align: center">
                <p class="mt-3" style="line-height: 30px"><b style="font-size: 30px"><?= $myChair['user_name'] ?></b></p>
                <p style="line-height: 30px">With an average score of <b style="font-size: 30px"><?= $myChair["rating_final"] ?></b></p>
                <p style="line-height: 30px">your workstation is the official </p>
                <p style="line-height: 30px"><b style="font-size: 30px"><?= $myRank ?> best</b> workstation in the</p>
                <p class="mb-3" style="line-height: 30px">office. <b style="font-size: 30px">Congratulations</b></p>
            </div>
        </div>

        <div id="overlay" onclick="off1()">
            <div id="text">
                <p class="my-3">Hey <b><?= $myChair['user_name'] ?></b>, glad to have you with us.</p>
                <p class="my-3"><b>Your Chair</b> gets a <b><?= $myChair["rating_chair"] ?></b>, because it is <?= $myChair["text_chair"] ?></p>
                <p class="my-3"><b>Your Setup</b> gets a <b><?= $myChair["rating_setup"] ?></b>, because <?= $myChair["text_setup"] ?></p>
                <p class="my-3"><b>Your Desk</b> gets a <b><?= $myChair["rating_desk"] ?></b>, because <?= $myChair["text_desk"] ?></p>
                <p class="my-3">Finally, This leaves you with an average score of <b><?= $myChair["rating_final"] ?></b>.</p>
                <p class="my-3">Wanna know your rank? Click the button if you dare...</p>
                <button onclick="on2()" class="button">Moehahahahahahahahahahaha</button>
            </div>
        </div>

        <button onclick="on1()"><img src="<?= $myChair["image"] ?>" alt="<?= $myChair['user_name'] ?>'s Desk" /></button>

        <script>
            function on1() {
                document.getElementById("overlay").style.display = "block";
            }

            function off1() {
                document.getElementById("overlay").style.display = "none";
            }

            function on2() {
                document.getElementById("overlay2").style.display = "block";
            }

            function off2() {
                document.getElementById("overlay2").style.display = "none";
            }
        </script>

        <div class="my-2">
            <p>PS: If you are unhappy with anything, contact Pepijn. He won't able to help you and I think that he'll delete your messages out of principle and spite. This saves me the trouble of doing it myself. Thanks Pepijn!</p>
        </div>

    </div>
</main>

<?php require('partials/footer.php') ?>
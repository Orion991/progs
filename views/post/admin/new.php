<?php include __DIR__ . "/../../layout/header.php"; ?>


    <main class="flex-shrink-0">
        <div class="container">
            <?php if (!empty($mesg)) { echo "Eintrag gespeichert!"; } ?>
            <form method="post" action="posts-new">
                <input type="text" name="title" class="form-control"><br/>
                <textarea name="content" class="form-control"></textarea><br/>
                <input type="submit"  class="btn btn-primary" value="Post eintragen">

            </form>
        </div>
    </main>
<?php include __DIR__ . "/../../layout/footer.php"; ?>
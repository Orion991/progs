<?php include __DIR__ . "/../layout/header.php"; ?>

<main class="flex-shrink-0">
    <div class="container">
    <h3 class="modal-title"><?php echo $post['titel']; ?></h3>

    <?php echo nl2br($post['content']); ?>
        <br/>
        <br/>

        <ul class="list-group">
            <h5>Kommentare:</h5>
            <?php foreach ($comments AS $comment): ?>
                <li class="list-group-item">
                    <?php echo e($comment->content, ENT_QUOTES, 'UTF-8');  ?>
                </li>
            <?php endforeach; ?>

        </ul>

        <form method="post" action="post?id=<?php echo $post['id']; ?>" >
            <textarea name="content" class="form-control"></textarea>
            <br/>
            <input type="submit" value="Kommentar hinzufügen" class="btn btn-primary">

        </form>
    </div>


</main>

<?php include __DIR__ . "/../layout/footer.php"; ?>

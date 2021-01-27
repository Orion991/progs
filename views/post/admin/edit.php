<?php include __DIR__ . "/../../layout/header.php"; ?>


<main class="flex-shrink-0">
    <div class="container">
        <form method="post" action="posts-edit?id=<?php echo e($entry->id) ?>">
            <input type="text" name="title" class="form-control" value="<?php echo e($entry->titel) ?>"><br/>
            <textarea name="content" class="form-control"><?php echo e($entry->content) ?></textarea><br/>
            <input type="submit"  class="btn btn-primary" value="Post ändern">

        </form>
    </div>
</main>
<?php include __DIR__ . "/../../layout/footer.php"; ?>

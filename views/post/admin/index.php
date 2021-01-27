<?php include __DIR__ . "/../../layout/header.php"; ?>

<main class="flex-shrink-0">
    <div class="container">
        <h1>Posts verwalten</h1>
        <ul>
            <?php foreach ($all AS $entry): ?>
                <li>
                    <a href="posts-edit?id=<?php echo $entry->id; ?>">
                        <?php echo e($entry->titel); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>

</main>

<?php include __DIR__ . "/../../layout/footer.php"; ?>

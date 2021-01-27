<?php include __DIR__ . "/../layout/header.php"; ?>

<main class="flex-shrink-0">
<div class="container">
<ul>
          <?php foreach ($posts AS $post): ?>
          <li>
              <a href="post?id=<?php echo $post->id; ?>">
              <?php echo $post->titel?>
              </a>
          </li>
          <?php endforeach; ?>
</ul>

</div>

</main>

<?php include __DIR__ . "/../layout/footer.php"; ?>

<?php include __DIR__ . "/../layout/header.php"; ?>

<main class="flex-shrink-0">
<div class="container">
<ul>
          <?php foreach ($erg AS $ergs): ?>
          <li>
              <a href="post?id=<?php echo $ergs->id; ?>">
              <?php echo $ergs->titel?>
              </a>
          </li>
          <?php endforeach; ?>

</ul>

</div>

</main>

<?php include __DIR__ . "/../layout/footer.php"; ?>

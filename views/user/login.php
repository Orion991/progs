<?php include __DIR__ . "/../layout/header.php"; ?>


<main class="flex-shrink-0">
    <div class="container">
        <br />
        <br />
        <?php if (!empty($error)): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endif; ?>
<form method="post" method="login" class="form-control">
    Benutzername:<input class="form-control-lg" type="text" name="username"/>
    Passwort: <input class="form-control-lg" type="password" name="password" />

    <input class="btn btn-primary" type="submit" value="Einloggen"/>
</form>
    </div>
</main>
<?php include __DIR__ . "/../layout/footer.php"; ?>

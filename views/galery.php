<!DOCTYPE html>
<html>
<head>
    <title>Galery - Camagru</title>
</head>
<body>
    <?php  include __DIR__."/../templates/header.php" ?>
    <div>
        <p>Welcome on the galery</p>
        <?php foreach ($pictures_paths as $img) {?>
        <div id=<?= "picture_" . $img->get_id() ?> style="background-color: pink; display: inline-block">
          <img src=<?= "/picture?img_name=" . $img->get_name()?>>
          <?php $author = $img->author($dbh) ?>
          <p>from: <?= $author->username ?></p>
          <p><?= $img->get_likes($dbh) ?> like(s)</p>
          <?php if (array_key_exists("login", $_SESSION)) { ?>
            <form method="post" action="/like">
              <input type="hidden" name="picture_id" value=<?= $img->get_id() ?>>
              <input type="submit" value="like">
            </form>
            <?php $comments = $img->get_comments($dbh) ?>
            <?php foreach ($comments as $comment) { ?>
              <p><?= $comment->get_author($dbh)->get_username() ?>: <?= $comment->get_text() ?></p>
            <?php } ?>
            <form method="post" action="/comment">
              <input type="hidden" name="picture_id" value=<?= $img->get_id() ?>>
              <input type="hidden" name="author_id" value=<?= $author->get_id() ?>>
              <input type="text" name="comment" required>
              <input type="submit" value="comment">
            </form>
            <?php if ($author->get_username() === $_SESSION["login"]) { ?>
            <form action="/delete_picture" method="POST">
              <input type="hidden" name="img_id" value=<?= $img->get_id() ?>>
              <input type="submit" name="delete" value="delete picture">
            </form>
            <?php } ?>
          <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php  include __DIR__."/../templates/footer.php" ?>
</body>
</html>
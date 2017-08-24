<?php
function template(string $title, $content) {
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
</head>
<body>
    <?=$content?>
</body>
</html>

<?php
}
return ob_get_clean();
?>
<?php
class View {
    public static function render($file, $variables = array()) {
        extract($variables);

        ob_start();
        include $file;
        $rendered_view = ob_get_clean();
        return $rendered_view;
    }
}
?>
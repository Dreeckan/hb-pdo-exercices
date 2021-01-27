<?php

/**
 * Charger les fichiers des classes (appeler un require_once) dès qu'on cherche à les appeler
 */
spl_autoload_register(function ($class) {
    // Dé-commenter la ligne ci-dessous si vous utilisez un Mac avec MAMP
    // $class = str_replace('\\', '/', $class);
    require_once "classes/$class.php";
});

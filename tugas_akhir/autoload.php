<?php 

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className);
    $filePath = __DIR__ . '/src/' . $classPath . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});
?>
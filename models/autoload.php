<?php
function autoload($classname)
{
    $path = __DIR__ . '/' . $classname . '.php';

    if (file_exists($path))
    {
        require $path;
    }
}

spl_autoload_register('autoload');
?>
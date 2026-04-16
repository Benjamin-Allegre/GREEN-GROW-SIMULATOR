<?php
function autoload($classname)
{
  if (file_exists($file = 'models/' . $classname . '.php'))
  {
    require $file;
  }
}

spl_autoload_register('autoload');
?>
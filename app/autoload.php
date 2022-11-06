<?php

spl_autoload_register(
     function (string $className)
    {
       $filenameTarget =  str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';

       if (file_exists($filenameTarget)) {
            require_once $filenameTarget;
       }
     }
);
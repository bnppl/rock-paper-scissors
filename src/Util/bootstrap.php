<?php

/**
 * This file should be refactored into a class, which does a bit more actual boot strapping, 
 * the autoloader could also be made more advanced and be put into it's own class
 *
 * @author beneppel
 */


define('DOCUMENT_ROOT', dirname(__FILE__).'/../../');

spl_autoload_register(function ($classname) {
    $classname = ltrim($classname, "\\");
    preg_match('/^(.+)?([^\\\\]+)$/U', $classname, $match);
    $classname = str_replace("\\", "/", $match[1])
        . str_replace(array("\\", "_"), "/", $match[2])
        . ".php";
    
    $src = DOCUMENT_ROOT.'src/';
    if(file_exists($src.$classname)){
        include_once $src.$classname;    
    }
});


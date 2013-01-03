<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bootstrap
 *
 * @author beneppel
 */


spl_autoload_register(function ($classname) {
    $classname = ltrim($classname, "\\");
    preg_match('/^(.+)?([^\\\\]+)$/U', $classname, $match);
    $classname = str_replace("\\", "/", $match[1])
        . str_replace(array("\\", "_"), "/", $match[2])
        . ".php";
    
    $document_root = dirname(__FILE__).'/../';
    if(file_exists($document_root.$classname)){
        include_once $document_root.$classname;    
    }
});

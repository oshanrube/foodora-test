<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 01:40 PM
 */


spl_autoload_register(function ($class_name)
{
    include str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
});
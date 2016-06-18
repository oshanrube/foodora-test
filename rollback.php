<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 07:00 PM
 */

include_once 'autoloader.php';

$fixer = new Classes\ScheduleFixer();
$fixer->runRollback();

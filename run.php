<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 07:00 PM
 */

include_once 'autoloader.php';

$fixer = new Classes\ScheduleFixer();

$from_date = '2015-12-20';
$to_date   = '2015-12-30';
$fixer->runReplacement($from_date, $to_date);
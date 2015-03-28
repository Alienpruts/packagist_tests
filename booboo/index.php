<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/27/15
 * Time: 11:49 PM
 */

require '../vendor/autoload.php';

use League\BooBoo\Runner;
use League\BooBoo\Formatter\HtmlFormatter;
use League\BooBoo\Formatter\NullFormatter;

/**
 * Instantiating booboo.
 */

$runner = new Runner();
//$runner->register();

//$runner->pushFormatter(new HtmlFormatter());

/**
 * Certain formatters can be set to show certain errors. For instance, all
 * errors of level WARNING or higher can be set to be displayed via browser,
 * while all the rest will be ignored (null formatter)
 */


$html = new HtmlFormatter();
$null = new NullFormatter();
//$json = new \League\BooBoo\Formatter\JsonFormatter();

$html->setErrorLimit(E_ERROR | E_WARNING | E_USER_ERROR | E_USER_WARNING);
$null->setErrorLimit(E_ALL);

// LIFO : so watch order of invoking
$runner->pushFormatter($null);
$runner->pushFormatter($html);

$runner->register();

/**
 * throw an error
 */

$test = new UnexistingClass();

<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/28/15
 * Time: 12:14 AM
 */

require '../vendor/autoload.php';

use League\CLImate\CLImate;

$climate = new CLImate();

$climate->out('This prints to the terminal.');

//inline will not put a break at end of line
$climate->inline('waiting');

for($i = 0; $i < 10; $i++) {
    $climate->inline('.');
}

/**
 * There are three writers to write messages to:
 * out -> STDOUT | error -> STDERR | buffer -> string buffer
 */

$climate->to('error')->red('Something went terribly wrong!');

/**
 *Accessing a registered writer
 */
$test = $climate->output->get('out');
var_dump($test);

$writers = $climate->output->getAvailable();
var_dump($writers);

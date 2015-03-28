<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/27/15
 * Time: 10:33 PM
 */

require '../vendor/autoload.php';

use Herrera\Version\Version;
use Herrera\Version\Comparator;
use Herrera\Version\Builder;
use Herrera\Version\Dumper;
use Herrera\Version\Parser;
use Herrera\Version\Validator;

/**
 * The Version library provides a programmatic way of creating and manipulating
 * semantic version numbers. Some methods will even automatically apply the logic
 * defined by Semantic Versioning specification.
 */

$builder = new Builder();
//d($builder);

/**
 * To perform a simple comparison, you may call the compareTo() method:
 */

$left = new Version(1,0,0);
$right = new Version(1,1,0);

//d($left, $right);

$result = Comparator::compareTo($left, $right);
//d($result);

/**
 * Dumping version information
 */

$version = new Version(1,2,3,array('alpha', '1'), array('2'));

//d(Dumper::toString($version));
//d(Dumper::toComponents($version));

/**
 * There are three ways of parsing version information.
 */

$builder = Parser::toBuilder('1.0.0-alpha.1+2');
//d($builder);

$components = Parser::toComponents('1.0.0-alpha.1+2');
//d($components);

$version = Parser::toVersion('1.0.0-alpha.1+2');
//d($version);

/**
 * Validating is meant to be used indirectly through other classes. You MAY
 * use it to validate via Semantic Versioning specificartion
 */

$version =  new Version(1,0,0);
//dd($version = $builder->getVersion());

$test = Validator::isIdentifier($version->getMajor());
//d($test);

$test2 = Validator::isNumber($version->getMajor());
//d($test2);
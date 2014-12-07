#!/usr/bin/env php
<?php
/**
 * Testdox html to Markdown conversion utility
 * For creating test contract files
 *
 * @author Ashley Kitson <akitson@zf4.biz>
 * @copyright Ashley Kitson, UK, 2014
 * @licence GPL V3 or later : http://www.gnu.org/licenses/gpl.html
 */
namespace chippyash\TDConv;
require_once dirname(__FILE__) . "/../../../vendor/autoload.php";

use Zend\Console\Console;
use Zend\Console\Getopt;

function title()
{
    echo 'Testdox html to markdown converter' . PHP_EOL;
}
function exitWithMessage($msg, $help, $code)
{
    title();
    echo $msg . PHP_EOL;
    echo $help;
    exit($code);
}

$rules = array(
    'help|h'      => 'Get usage message',
    'title|t-s'   => 'Document title: default = "Foo"'
);

try {
    $opts = new Getopt($rules);
    $opts->parse();
} catch (Console\Exception\RuntimeException $e) {
    exitWithMessage($e->getMessage(), $e->getUsageMessage(), 1);
}

if ($opts->getOption('h')) {
    exitWithMessage(
            'tdconv.php <testdox.html.file.name> <output.file.name>', 
            $opts->getUsageMessage(), 0);
}

$title = false;
$args = $opts->getArguments();
if ($opts->getOption('t')) {
    $title = $opts->getOption('t');
    unset($args['title']);
}

$testdoxFile = $args[0];
$outputFile = $args[1];

//get the xml translation
$xsldoc = new \DOMDocument();
$xsldoc->load(dirname(__FILE__) . '/xsl/tdconv.xsl');

$xmldoc = new \DOMDocument();
$xmldoc->loadHTMLFile($testdoxFile);

$xsl = new \XSLTProcessor();
$xsl->importStyleSheet($xsldoc);
if ($title !== false) {
    $xsl->setParameter('', 'title', $title);
}
$xsl->transformToUri($xmldoc, $outputFile);


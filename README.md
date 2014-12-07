# chippyash/testdox-converter


## What?

Testdox html to Markdown conversion utility. A Utility that will convert
Testdox formatted html output from PHPUnit into Markdown format

## Why?

To provide markdown formatted test contract files for inclusion in public files
for a PHP library or application.

## When

Additions to the utility are time dependent.

If you want more, either suggest it, or better still, fork it and provide a pull request.

Check out [chippyash/Logical-Matrix](https://github.com/chippyash/Logical-matrix) for logical matrix operations

Check out [chippyash/Math-Matrix](https://github.com/chippyash/Math-Matrix) for mathematical matrix operations

Check out [chippyash/Strong-Type](https://github.com/chippyashl/Strong-Type) for strong type including numeric,
rational and complex type support

Check out [chippyash/Math-Type-Calculator](https://github.com/chippyash/Math-Type-Calculator) for arithmetic operations on aforementioned strong types

Check out [chippyash/Builder-Pattern](https://github.com/chippyash/Builder-Pattern) for an implementation of the Builder Pattern for PHP

## How

Install the package: See below.

Assuming that you have installed into your home directory at ~/tdconv, then the
command is available at ~/tdconv/bin/tdconv.

Usage:
tdconv [-t|title="..."] sourceHtmlTestDoxFile targetMarkdownTestContractFile

e.g.
~/tdconv/bin/tdconv -t "This is the title" myLibTest.html contract.md

To create the testdox file, you would run phpunit with the --testdox-html option

### Changing the library

1.  fork it
2.  write the test
3.  amend it
4.  do a pull request

Found a bug you can't figure out?

1.  fork it
2.  write the test
3.  do a pull request

NB. Make sure you rebase to HEAD before your pull request

## Where?

The library is hosted at [Github](https://github.com/chippyash/Testdox-Converter). It is
available at [Packagist.org](https://packagist.org/packages/chippyash/testdox-converter)

### Installation

Install [Composer](https://getcomposer.org/)

#### For production

composer.phar create-project -sdev chippyash/testdox-converter tdconv

This will download the package and install it into the ./tdconv directory. 
./tdconv/bin/tdconv is a symlink to the executable

#### For development

Clone this repo, and then run Composer in local repo root to pull in dependencies

<pre>
    git clone git@github.com:chippyash/Testdox-Converter.git TDConv
    cd TDConv
    composer install
</pre>


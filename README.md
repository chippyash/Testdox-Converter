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

Check out [ZF4 Packages](http://zf4.biz/packages?utm_source=github&utm_medium=web&utm_campaign=blinks&utm_content=testdoxconverter) for more packages

## How

Install the package: See below.

Assuming that you have installed into your home directory at ~/tdconv, then the
command is available at ~/tdconv/bin/tdconv.

Usage:
tdconv [-t|title="..."] sourceHtmlTestDoxFile targetMarkdownTestContractFile

e.g.
~/tdconv/bin/tdconv -t "This is the title" myLibTest.html contract.md

To create the testdox file, you would run phpunit with the --testdox-html option

This is a typical build script by way of example: build.sh

<pre>
#!/bin/bash
cd ~/Projects/chippyash/source/Monad
vendor/phpunit/phpunit/phpunit -c test/phpunit.xml --testdox-html contract.html test/
tdconv -t "Chippyash Monad" contract.html docs/Test-Contract.md
rm contract.html
</pre>

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

Caveat: These instructions assume a Linux OS. (If you are a Windows/Mac user, 
please consider adding installation and usage instructions to this repo by way 
of a pull request.)

Install [Composer](https://getcomposer.org/)

Install the PHP XSL extension e.g. For debian based Linux
<pre>
    apt-get install php5-xsl
</pre>

PHP normally has the XML extension built-in, but you may need to install it manually.

#### For production

Assumes Linux OS. (If you are a Windows/Mac user, please consider adding installation
and usage instructions to this repo by way of a pull request.)

composer.phar create-project -sdev chippyash/testdox-converter tdconv

This will download the package and install it into the ./tdconv directory. 
./tdconv/bin/tdconv is a symlink to the executable.  If you have a ~/bin directory
in you path you might want to move or copy the link to it, or add the bin path
to your $PATH variable.

If prompted with a "Do you want to remove the existing VCS (.git, .svn..) history?"
message, then answer "Y" (the default answer.)

#### For development

Clone this repo, and then run Composer in local repo root to pull in dependencies

<pre>
    git clone git@github.com:chippyash/Testdox-Converter.git TDConv
    cd TDConv
    composer install
</pre>

### History

V1.0.0 Initial release

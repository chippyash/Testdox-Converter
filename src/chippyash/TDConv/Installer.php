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

use Composer\Script\Event;

/**
 * Package installation
 */
class Installer
{
    /**
     * Post Package Install event
     * 
     * Softlink the tdconv.php file because Composer will only do this
     * if this package is part of a bigger package
     * 
     * @param Event $event
     */
    public static function ppi(Event $event)
    {
        $config = $event->getComposer()->getConfig();
        $linkFileDir = realpath(__DIR__ . '/../../../bin');
        $linkFile = $linkFileDir . '/tdconv';
        
        if (!file_exists($linkFileDir)) {
            mkdir($linkFileDir);
        }
        
        if (!file_exists($linkFile)) {
            $binFile = __DIR__ . '/tdconv.php';
            symlink($binFile, $linkFile);
            chmod($linkFile, 0744);
        }
    }
}

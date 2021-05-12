<?php

namespace ByTIC\Purifier\Tests;

use ByTIC\Purifier\Config\Config;
use ByTIC\Purifier\Purifier;
use Nip\Config\Factory;

/**
 * Class PurifierTest
 * @package ByTIC\Purifier\Tests
 */
class PurifierTest extends AbstractTest
{
    public function test_config_has_defaults()
    {
        Factory::fromFiles(
            \config(),
            ['purifier' => TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'purifier.php']
        );
        $purifier = new Purifier();

        self::assertSame(
            TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'cache',
            $purifier->getPurifier()->config->get(Config::CACHE_PATH)
        );
    }

    public function test_clean()
    {
        $purifier = new Purifier();

        $html = '<b>Simple and short';
        $pureHtml = $purifier->clean($html);
        static::assertSame('<b>Simple and short</b>', $pureHtml);

        $html = [
            '<script>alert(\'XSS\');</script>',
            '<b>Simple and short',
        ];
        $pureHtml = $purifier->clean($html);
        static::assertSame(['', '<b>Simple and short</b>'], $pureHtml);
    }
}
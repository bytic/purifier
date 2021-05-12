<?php

namespace ByTIC\Purifier\Tests;

use ByTIC\Purifier\Purifier;

/**
 * Class PurifierTest
 * @package ByTIC\Purifier\Tests
 */
class PurifierTest extends AbstractTest
{

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
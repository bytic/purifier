<?php

namespace ByTIC\Purifier\Tests\Profiles;

use ByTIC\Purifier\Profiles\FullEditorProfile;
use HTMLPurifier;

/**
 * Class FullEditorProfileTest
 * @package ByTIC\Purifier\Tests\Profiles
 */
class FullEditorProfileTest extends \ByTIC\Purifier\Tests\AbstractTest
{
    public function test_default_safeEmbed()
    {
        $profile = new FullEditorProfile();

        $config = $profile->getConfig();
        $purifier = new HTMLPurifier($config);

        self::assertSame(
            str_replace("\r\n", "\n", $this->htmlFixture('/embed_test/output.html')),
            str_replace("\r\n", "\n", $purifier->purify($this->htmlFixture('/embed_test/input.html')))
        );
    }
}
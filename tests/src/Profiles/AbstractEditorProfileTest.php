<?php

namespace ByTIC\Purifier\Tests\Profiles;

use ByTIC\Purifier\Profiles\AbstractProfile;
use HTMLPurifier;

/**
 * Class FullEditorProfileTest
 * @package ByTIC\Purifier\Tests\Profiles
 */
abstract class AbstractEditorProfileTest extends \ByTIC\Purifier\Tests\AbstractTest
{
    public function test_default_safeEmbed()
    {
        $class = $this->editorClass();
        /** @var AbstractProfile $profile */
        $profile = new $class();
        $name = $profile::NAME;

        $config = $profile->getConfig();
        $purifier = new HTMLPurifier($config);

        self::assertSame(
            str_replace("\r\n", "\n", $this->htmlFixture('/boilerplate/output_' . $name . '.html')),
            str_replace("\r\n", "\n", $purifier->purify($this->htmlFixture('/boilerplate/input.html')))
        );
    }

    /**
     * @return string
     */
    abstract protected function editorClass();
}
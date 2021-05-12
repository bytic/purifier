<?php

namespace ByTIC\Purifier\Tests\Profiles;

use ByTIC\Purifier\Profiles\FullEditorProfile;

/**
 * Class FullEditorProfileTest
 * @package ByTIC\Purifier\Tests\Profiles
 */
class FullEditorProfileTest extends AbstractEditorProfileTest
{

    protected function editorClass(): string
    {
        return FullEditorProfile::class;
    }
}
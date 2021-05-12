<?php

namespace ByTIC\Purifier\Tests\Profiles;

use ByTIC\Purifier\Profiles\SimpleEditorProfile;

/**
 * Class SimpleEditorProfileTest
 * @package ByTIC\Purifier\Tests\Profiles
 */
class SimpleEditorProfileTest extends AbstractEditorProfileTest
{

    protected function editorClass(): string
    {
        return SimpleEditorProfile::class;
    }
}
<?php

namespace ByTIC\Purifier\Tests\Profiles;

use ByTIC\Purifier\Profiles\MiniEditorProfile;

/**
 * Class SimpleEditorProfileTest
 * @package ByTIC\Purifier\Tests\Profiles
 */
class MiniEditorProfileTest extends AbstractEditorProfileTest
{

    protected function editorClass(): string
    {
        return MiniEditorProfile::class;
    }
}
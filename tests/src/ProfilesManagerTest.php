<?php

namespace ByTIC\Purifier\Tests;

use ByTIC\Purifier\Profiles\FullEditorProfile;
use ByTIC\Purifier\Profiles\MiniEditorProfile;
use ByTIC\Purifier\Profiles\SimpleEditorProfile;
use ByTIC\Purifier\ProfilesManager;

/**
 * Class FilterManagerTest
 * @package ByTIC\Purifier\Tests\Filters
 */
class ProfilesManagerTest extends AbstractTest
{
    public function test_filter()
    {
        $manager = new ProfilesManager();
        $filter = $manager->get('full');

        self::assertInstanceOf(FullEditorProfile::class, $filter);
    }

    public function test_filter_make_once()
    {
        $manager = \Mockery::mock(ProfilesManager::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $manager->shouldReceive('make')->once();

        $manager->get('full');
        $manager->get('full');
        $manager->get('full');
    }

    public function test_has_default_profiles()
    {
        $manager = new ProfilesManager();
        self::assertTrue($manager->has(FullEditorProfile::NAME));
        self::assertTrue($manager->has(SimpleEditorProfile::NAME));
        self::assertTrue($manager->has(MiniEditorProfile::NAME));
    }
}

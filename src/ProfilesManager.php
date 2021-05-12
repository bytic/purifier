<?php

namespace ByTIC\Purifier;

use ByTIC\Purifier\Profiles\AbstractProfile;
use ByTIC\Purifier\Profiles\ConfigFactory;
use ByTIC\Purifier\Profiles\EditorProfile;
use ByTIC\Purifier\Profiles\FullEditorProfile;
use ByTIC\Purifier\Profiles\MiniEditorProfile;
use ByTIC\Purifier\Profiles\SimpleEditorProfile;
use Nip\Config\Utils\PackageHasConfigTrait;

/**
 * Class ProfilesManager
 * @package ByTIC\Purifier
 */
class ProfilesManager
{
    use PackageHasConfigTrait;

    protected $profiles = [];

    /**
     * @param null|string $name
     * @return AbstractProfile
     */
    public function get($name = null)
    {
        $name = $this->parseName($name);

        if (!isset($this->profiles[$name])) {
            $filter = $this->make($name);
            $this->set($filter, $name);
        }

        return $this->profiles[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        $name = $this->parseName($name);
        return isset($this->profiles[$name]);
    }

    /**
     * @param AbstractProfile $profile
     * @param string $name
     */
    public function set($profile, string $name)
    {
        $this->profiles[$name] = $profile;
    }

    /**
     * @param $name
     * @return string|null
     */
    protected function parseName($name): ?string
    {
        return $name ?: 'base';
    }

    protected function make(string $name): AbstractProfile
    {
        $profileClass = static::class($name);

        $profile = new $profileClass();
        $profile = $this->configuration($profile, $name);

        return $profile;
    }

    protected function configuration($profile, string $name): AbstractProfile
    {
        $config = $this->getPackageConfig($name, []);

        return $profile;
    }

    protected static function class($name): string
    {
        switch ($name) {
            case 'full' :
                return FullEditorProfile::class;
            case 'mini' :
                return MiniEditorProfile::class;
            case 'simple' :
                return SimpleEditorProfile::class;
        }
        return EditorProfile::class;
    }

    /**
     * @return string
     */
    protected static function getPackageConfigName(): string
    {
        return 'purifier.profiles';
    }
}
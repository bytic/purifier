<?php

namespace ByTIC\Purifier\Config;

use ByTIC\Purifier\Profiles\AbstractProfile;
use HTMLPurifier_Config;

/**
 * Class ConfigFactory
 * @package ByTIC\Purifier\Config
 */
class ConfigFactory
{
    /**
     * @param AbstractProfile $profile
     * @param HTMLPurifier_Config|null $config
     * @return HTMLPurifier_Config
     */
    public static function fromProfile(AbstractProfile $profile, HTMLPurifier_Config $config = null): HTMLPurifier_Config
    {
        return static::fromArray($profile->buildConfigArray(), $config);
    }

    /**
     * @param array $data
     * @param HTMLPurifier_Config|null $config
     * @return HTMLPurifier_Config
     */
    public static function fromArray(array $data, HTMLPurifier_Config $config = null): HTMLPurifier_Config
    {
        // Create a new configuration object
        $config = $config ?? HTMLPurifier_Config::createDefault();

        foreach ($data as $key => $value) {
            $config->set($key, $value);
        }
        return $config;
    }
}
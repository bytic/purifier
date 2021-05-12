<?php

namespace ByTIC\Purifier\Profiles;

use ByTIC\Purifier\Config\ConfigFactory;
use HTMLPurifier_Config;

/**
 * Class AbstractConfig
 * @package ByTIC\Purifier\Config
 */
abstract class AbstractProfile
{
    public $allowedTags = [];
    public $allowedAttributes = [];

    /**
     * @var HTMLPurifier_Config
     */
    protected $config = null;

    /**
     * AbstractConfig constructor.
     */
    public function __construct(array $config = [])
    {
        $config['allowedTags'] = $config['allowedTags'] ??
            (defined(static::class . '::ALLOWED_TAGS') ? static::ALLOWED_TAGS : []);

        $config['allowedAttributes'] = $config['allowedAttributes'] ??
            (defined(static::class . '::ALLOWED_ATTRIBUTES') ? static::ALLOWED_ATTRIBUTES : []);
    }

    /**
     * @param array $config
     */
    public function fill(array $config = [])
    {
        foreach ($config as $name => $value) {
            $this->{$name} = $value;
        }
    }

    /**
     * @param HTMLPurifier_Config|null $config
     * @return HTMLPurifier_Config
     */
    public function getConfig(HTMLPurifier_Config $config = null): HTMLPurifier_Config
    {
        if ($this->config === null) {
            $this->config = $this->buildConfig($config);
        }
        return $this->config;
    }

    public function buildConfigArray(): array
    {
        return [
            'HTML.AllowedElements' => $this->allowedTags,
            'HTML.AllowedAttributes' => $this->allowedAttributes
        ];
    }

    /**
     * @param HTMLPurifier_Config|null $config
     * @return HTMLPurifier_Config
     */
    protected function buildConfig(HTMLPurifier_Config $config = null): HTMLPurifier_Config
    {
        return ConfigFactory::fromProfile($this, $config);
    }
}
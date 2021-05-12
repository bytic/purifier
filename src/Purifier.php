<?php

namespace ByTIC\Purifier;

use ByTIC\Purifier\Config\ConfigFactory;
use HTMLPurifier;
use HTMLPurifier_Config;
use Nip\Config\Utils\PackageHasConfigTrait;

/**
 * Class Purifier
 * @package ByTIC\Purifier
 */
class Purifier
{
    use PackageHasConfigTrait;

    /**
     * @var HTMLPurifier
     */
    protected $purifier;

    /**
     * @var ProfilesManager
     */
    protected $profiles;

    /**
     * Purifier constructor.
     * @param HTMLPurifier|null $purifier
     * @param ProfilesManager|null $profiles
     */
    public function __construct(HTMLPurifier $purifier = null, ProfilesManager $profiles = null)
    {
        $this->setPurifier($purifier);
        $this->profiles = $profiles;
    }

    /**
     * @param $dirty
     * @param null $config
     * @param \Closure|null $postCreateConfigHook
     * @return string|string[]
     */
    public function clean($dirty, $config = null)
    {
        $config = $this->config($config);

        return is_array($dirty)
            ? $this->purifier->purifyArray($dirty, $config)
            : $this->purifier->purify($dirty, $config);
    }

    /**
     * Set the underlying purifier instance.
     *
     * @param HTMLPurifier $purifier
     *
     * @return $this
     */
    public function setPurifier(HTMLPurifier $purifier = null)
    {
        $this->purifier = $purifier ?? new HTMLPurifier($this->defaultConfig());

        return $this;
    }

    /**
     * Get the underlying purifier instance.
     *
     * @return HTMLPurifier
     */
    public function getPurifier()
    {
        return $this->purifier;
    }

    /**
     * @param null $config
     */
    protected function config($config = null): HTMLPurifier_Config
    {
        if ($config instanceof HTMLPurifier_Config) {
            // pass-through
            return $config;
        }

        $default_config = $this->defaultConfig();
        if (is_string($config) && $this->profiles->has($config)) {
            return $this->profiles->get($config)->getConfig($default_config);
        }

        return $default_config;
    }

    protected function defaultConfig(): HTMLPurifier_Config
    {
        $data = $this->getPackageConfig('defaults', []);

        return ConfigFactory::fromArray($data);
    }

    protected static function getPackageConfigName(): string
    {
        return 'purifier';
    }
}
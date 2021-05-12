<?php

namespace ByTIC\Purifier\Profiles;

use ByTIC\Purifier\Config\ConfigFactory;
use ByTIC\Purifier\Filters\EmbeddedFilter;
use HTMLPurifier_Config;

/**
 * Class AbstractConfig
 * @package ByTIC\Purifier\Config
 */
abstract class AbstractProfile
{
    public $allowedTags = [];
    public $allowedAttributes = [];

    public $allowed = '';
    public $safeEmbed = false;
    public $safeObject = false;
    public $safeIframe = false;
    public $safeIframeRegexp = null;

    public $filterCustom = [];

    /**
     * @var HTMLPurifier_Config
     */
    protected $config = null;

    /**
     * AbstractConfig constructor.
     */
    public function __construct(array $config = [])
    {
        $config = array_merge($this->defaultConfig(), $config);
        $this->fill($config);
    }

    /**
     * @param array $config
     */
    public function fill(array $config = [])
    {
        foreach ($config as $name => $value) {
            $method = 'set' . ucfirst($name);
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                $this->{$name} = $value;
            }
        }
    }

    /**
     * @param false $allow
     */
    public function setAllowEmbed(bool $allow = false)
    {
        if ($allow === false) {
            return;
        }
        $this->safeEmbed = true;
        $this->safeObject = true;
        $this->safeIframe = true;
        $this->safeIframeRegexp = '%^https://(www.youtube.com/embed/|player.vimeo.com/video/)%';
        array_push($this->filterCustom, new EmbeddedFilter());
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
            'Attr.AllowedFrameTargets' => ['_blank'],
            'HTML.Allowed' => $this->allowed,
            'HTML.AllowedElements' => $this->allowedTags,
            'HTML.AllowedAttributes' => $this->allowedAttributes,
            'HTML.SafeEmbed' => $this->safeEmbed,
            'HTML.SafeObject' => $this->safeObject,
            'HTML.SafeIframe' => $this->safeIframe,
            'URI.SafeIframeRegexp' => $this->safeIframeRegexp,
            'Filter.Custom' => $this->filterCustom
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

    /**
     * @return array
     */
    protected function defaultConfig(): array
    {
        $config = [];

        $config['allowedTags'] = defined(static::class . '::ALLOWED_TAGS')
            ? static::ALLOWED_TAGS : [];

        $config['allowedAttributes'] = defined(static::class . '::ALLOWED_ATTRIBUTES')
            ? static::ALLOWED_ATTRIBUTES : [];
        return $config;
    }
}
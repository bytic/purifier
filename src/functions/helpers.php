<?php

if (!function_exists('purifier')) {
    /**
     * Clean HTML using the configured purifier instance.
     *
     * @param mixed $dirty
     * @param mixed $config
     * @return mixed
     */
    function purifier($dirty, $config = null)
    {
        return \ByTIC\Purifier\Utility\Purifier::clean($dirty, $config);
    }
}

if (!function_exists('purifier_config')) {
    /**
     * Get a purifier config value using the package config namespace.
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    function purifier_config($key = null, $default = null)
    {
        $path = 'purifier';
        if (!empty($key)) {
            $path .= '.' . $key;
        }

        return config($path, $default);
    }
}

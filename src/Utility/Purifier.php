<?php

namespace ByTIC\Purifier\Utility;

/**
 * Class Purifier
 * @package ByTIC\Purifier\Utility
 */
class Purifier
{
    /**
     * @param $dirty
     * @param null $config
     * @return string|string[]
     */
    public static function clean($dirty, $config = null)
    {
        return static::instance()->clean($dirty, $config);
    }

    /**
     * @return \ByTIC\Purifier\Purifier
     */
    public static function instance()
    {
        static $instance;
        if (!($instance instanceof self)) {
            $container = \Nip\Container\Utility\Container::get();

            /** @var \ByTIC\Purifier\Purifier $manager */
            $instance = $container->get(\ByTIC\Purifier\Purifier::class);
        }
        return $instance;
    }
}

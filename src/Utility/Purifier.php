<?php

namespace ByTIC\Purifier\Utility;

/**
 * Class Purifier
 * @package ByTIC\Purifier\Utility
 *
 * @method static clean($dirty, $config = null)
 */
class Purifier
{

    /**
     * Magic Method for calling methods on the default container.
     *
     * <code>
     *     // Call the "styles" method on the default container
     *     echo Orchestra\Asset::styles();
     *
     *     // Call the "add" method on the default container
     *     Orchestra\Asset::add('jquery', 'js/jquery.js');
     * </code>
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return call_user_func_array([static::instance()->entry(), $method], $parameters);
    }

    /**
     * @return mixed|static
     */
    public static function instance()
    {
        static $instance;
        if (!($instance instanceof self)) {
            $container = \Nip\Container\Utility\Container::get();

            /** @var \ByTIC\Purifier\ProfilesManager $manager */
            $instance = $container->get(\ByTIC\Purifier\ProfilesManager::class);
        }
        return $instance;
    }
}

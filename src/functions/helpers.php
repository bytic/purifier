<?php

if (!function_exists('prurfier')) {
    /**
     * @param null $name
     * @return HTMLPurifier
     */
    function form_html_filter($name = null): HTMLPurifier
    {
        $container = \Nip\Container\Utility\Container::get();

        /** @var \ByTIC\Purifier\ProfilesManager $manager */
        $manager = $container->get(\ByTIC\Purifier\ProfilesManager::class);

        return $manager->profile($name);
    }
}
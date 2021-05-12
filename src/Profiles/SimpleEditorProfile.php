<?php

namespace ByTIC\Purifier\Profiles;

/**
 * Class SimpleEditorConfig
 * @package ByTIC\Purifier\Config
 */
class SimpleEditorProfile extends AbstractProfile
{
    public const NAME = 'simple';

    public const  ALLOWED_TAGS = ["a", "b", "br", "p", "img", "small", "span", "strong", "ul", "li"];
    public const  ALLOWED_ATTRIBUTES = ["align", "src", "href", "target"];
}
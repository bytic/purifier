<?php

namespace ByTIC\Purifier\Profiles;

/**
 * Class MiniEditorConfig
 * @package ByTIC\Purifier\Config
 */
class MiniEditorProfile extends AbstractProfile
{
    public const NAME = 'mini';

    public const ALLOWED_TAGS = ["a", "b", "br", "p", "span", "strong"];
    public const ALLOWED_ATTRIBUTES = ["align", "href", "target", "rel"];
}
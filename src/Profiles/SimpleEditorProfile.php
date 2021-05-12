<?php

namespace ByTIC\Purifier\Profiles;

/**
 * Class SimpleEditorConfig
 * @package ByTIC\Purifier\Config
 */
class SimpleEditorProfile extends MiniEditorProfile
{
    public const NAME = 'simple';

    public const  ALLOWED_TAGS = ["a", "b", "br", "p", "img", "small", "span", "strong", "ul", "li"];
    public const  ALLOWED_ATTRIBUTES = ["align", "src", "href", "target"];

    public $safeEmbed = true;
    public $safeObject = true;
    public $safeIframe = true;
    public $safeIframeRegexp = '%^https://(www.youtube.com/embed/|player.vimeo.com/video/)%';
}
<?php

namespace ByTIC\Purifier\Profiles;

/**
 * Class SimpleEditorConfig
 * @package ByTIC\Purifier\Config
 */
class SimpleEditorProfile extends MiniEditorProfile
{
    public const NAME = 'simple';

    public const  ALLOWED_TAGS = ["a", "b", "br", "p", "img", "iframe", "small", "span", "strong", "ul", "ol", "li"];
    public const  ALLOWED_ATTRIBUTES = [
        "align",
        "src",
        "href",
        "width",
        "height",
        "target"
    ];

    public $safeEmbed = true;
    public $safeObject = true;
    public $safeIframe = true;
    public $safeIframeRegexp = '%^https://(www.youtube.com/embed/|player.vimeo.com/video/)%';
}
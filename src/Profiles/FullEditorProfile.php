<?php

namespace ByTIC\Purifier\Profiles;

/**
 * Class FullEditorConfig
 * @package ByTIC\Purifier\Config
 */
class FullEditorProfile extends SimpleEditorProfile
{
    public const NAME = 'full';

    public const ALLOWED_TAGS = [
        "a",
        "b",
        "blockquote",
        "br",
        "caption",
        "center",
        "col",
        "colgroup",
        "em",
        "font",
        "h1",
        "h2",
        "h3",
        "h4",
        "h5",
        "h6",
        "hr",
        "iframe",
        "img",
        "li",
        "ol",
        "p",
        "pre",
        "s",
        "small",
        "span",
        "strike",
        "strong",
        "sub",
        "sup",
        "table",
        "tbody",
        "td",
        "tfoot",
        "th",
        "thead",
        "tr",
        "tt",
        "u",
        "ul",
    ];

    public const ALLOWED_ATTRIBUTES = [
        "abbr",
        "align",
        "alt",
        "bgcolor",
        "border",
        "cite",
        "clear",
        "color",
        "face",
        "height",
        "href",
        "hspace",
        "noshade",
        "nowrap",
        "rel",
        "rev",
        "rowspan",
        "rules",
        "scope",
        "size",
        "span",
        "src",
        "start",
        "style",
        "summary",
        "target",
        "title",
        "type",
        "valign",
        "value",
        "vspace",
        "width"
    ];
}
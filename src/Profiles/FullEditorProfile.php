<?php

namespace ByTIC\Purifier\Profiles;

use HTMLPurifier_Config;

/**
 * Class FullEditorConfig
 * @package ByTIC\Purifier\Config
 */
class FullEditorProfile extends AbstractProfile
{
    public const ALLOWED_TAGS = [
        "a",
        "b",
        "blink",
        "blockquote",
        "br",
        "caption",
        "center",
        "col",
        "colgroup",
        "comment",
        "em",
        "font",
        "h1",
        "h2",
        "h3",
        "h4",
        "h5",
        "h6",
        "hr",
        "img",
        "li",
        "marquee",
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
        "ul"
    ];

    public const  ALLOWED_ATTRIBUTES = [
        "abbr",
        "align",
        "alt",
        "axis",
        "background",
        "behavior",
        "bgcolor",
        "border",
        "bordercolor",
        "bordercolordark",
        "bordercolorlight",
        "bottompadding",
        "cellpadding",
        "cellspacing",
        "char",
        "charoff",
        "cite",
        "clear",
        "color",
        "cols",
        "direction",
        "face",
        "font-weight",
        "headers",
        "height",
        "href",
        "hspace",
        "leftpadding",
        "loop",
        "noshade",
        "nowrap",
        "point-size",
        "rel",
        "rev",
        "rightpadding",
        "rowspan",
        "rules",
        "scope",
        "scrollamount",
        "scrolldelay",
        "size",
        "span",
        "src",
        "start",
        "style",
        "summary",
        "target",
        "title",
        "toppadding",
        "type",
        "valign",
        "value",
        "vspace",
        "width",
        "wrap"
    ];


    public function populateFilterConfig(HTMLPurifier_Config $filter_config): AbstractProfile
    {
        $filter_config->set('HTML.AllowedElements', $this->allowedTags);
        $filter_config->set('HTML.AllowedAttributes', $this->allowedAttributes);
        return $this;
    }
}
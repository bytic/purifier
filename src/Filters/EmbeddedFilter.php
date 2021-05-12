<?php

namespace ByTIC\Purifier\Filters;

use HTMLPurifier_Config;
use HTMLPurifier_Context;
use HTMLPurifier_Filter;

/**
 * Class EmbeddedFilter
 * @package ByTIC\Purifier\Filters
 */
class EmbeddedFilter extends HTMLPurifier_Filter
{
    /**
     * @type string
     */
    public $name = 'ByTICEmbedded';

//    /**
//     * Pre-processor function, handles HTML before HTML Purifier
//     * @param string $html
//     * @param HTMLPurifier_Config $config
//     * @param HTMLPurifier_Context $context
//     * @return string
//     */
//    public function preFilter($html, $config = null, $context = null)
//    {
//        $html = preg_replace('#<iframe#i', '<img class="MyIframe"', $html);
//        $html = preg_replace('#</iframe>#i', '</img>', $html);
//        return $html;
//    }

    /**
     * Post-processor function, handles HTML after HTML Purifier
     * @param string $html
     * @param HTMLPurifier_Config $config
     * @param HTMLPurifier_Context $context
     * @return string
     */
    public function postFilter($html, $config = null, $context = null)
    {
        $post_regex = '#<iframe ([^>]+?)>#';
        return preg_replace_callback($post_regex, [$this, 'postFilterCallback'], $html);
    }

    /**
     *
     * @param array $matches
     * @return string
     */
    protected function postFilterCallback($matches)
    {
        // Domain Whitelist
        $youTubeMatch = preg_match('#src="https?://www.youtube(-nocookie)?.com/#i', $matches[1]);
        $vimeoMatch = preg_match('#src="http://player.vimeo.com/#i', $matches[1]);

        if ($youTubeMatch === false && $vimeoMatch == false) {
            return '';
        }
        $extra = ' frameborder="0"';
        if ($youTubeMatch) {
            $extra .= ' allowfullscreen';
        } elseif ($vimeoMatch) {
            $extra .= ' webkitAllowFullScreen mozallowfullscreen allowFullScreen';
        }
        return '<div class="ratio ratio-16x9"><iframe ' . $matches[1] . $extra . '></iframe></div>';
    }
}
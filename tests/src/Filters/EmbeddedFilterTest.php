<?php

namespace ByTIC\Purifier\Tests\Filters;

use ByTIC\Purifier\Filters\EmbeddedFilter;
use ByTIC\Purifier\Tests\AbstractTest;

/**
 * Class EmbeddedFilterTest
 * @package ByTIC\Purifier\Tests\Filters
 */
class EmbeddedFilterTest extends AbstractTest
{
    /**
     * @param $input
     * @param $output
     * @dataProvider data_filter
     */
    public function test_filter($input, $output)
    {
        $filter = new EmbeddedFilter();
        $input = $filter->preFilter($input, null, null);
        $input = $filter->postFilter($input, null, null);

        self::assertSame($output, $input);

    }

    public function data_filter(): array
    {
        return [
            [
                '<iframe src="https://www.youtube.com/embed/fyO8pvpnTdE?list=WL&amp;index=14" width="560" height="314"></iframe>',
                '<div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/fyO8pvpnTdE?list=WL&amp;index=14" width="560" height="314" frameborder="0" allowfullscreen></iframe></div></iframe>'
            ],
        ];
    }
}
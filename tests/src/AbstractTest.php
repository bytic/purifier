<?php

namespace ByTIC\Purifier\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nip\Config\Config;
use Nip\Container\Container;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package ByTIC\Purifier\Tests
 */
abstract class AbstractTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @param null $path
     * @return false|string
     */
    protected function htmlFixture($path = null)
    {
        return file_get_contents(TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'html' . $path);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $container = \Nip\Container\Utility\Container::container(true);

        $container->set('config', new Config([], true));
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Container::setInstance(null);
    }
}

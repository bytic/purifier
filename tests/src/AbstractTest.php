<?php

namespace ByTIC\Purifier\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package ByTIC\Purifier\Tests
 */
abstract class AbstractTest extends TestCase
{
    use MockeryPHPUnitIntegration;
}

<?php

declare(strict_types=1);

namespace ByTIC\Purifier\Utility;

use Nip\Config\Utils\PackageHasConfigTrait;

class PackageConfig
{
    use PackageHasConfigTrait;

    public static function configPath(): string
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'purifier.php';
    }

    protected static function getPackageConfigName(): string
    {
        return 'purifier';
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit99d3067f554ba05f285bceed869e510e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/league/color-extractor/src',
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'claviska' => 
            array (
                0 => __DIR__ . '/..' . '/claviska/simpleimage/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'League\\ColorExtractor\\Color' => __DIR__ . '/..' . '/league/color-extractor/src/League/ColorExtractor/Color.php',
        'League\\ColorExtractor\\ColorExtractor' => __DIR__ . '/..' . '/league/color-extractor/src/League/ColorExtractor/ColorExtractor.php',
        'League\\ColorExtractor\\Palette' => __DIR__ . '/..' . '/league/color-extractor/src/League/ColorExtractor/Palette.php',
        'claviska\\SimpleImage' => __DIR__ . '/..' . '/claviska/simpleimage/src/claviska/SimpleImage.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit99d3067f554ba05f285bceed869e510e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit99d3067f554ba05f285bceed869e510e::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit99d3067f554ba05f285bceed869e510e::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit99d3067f554ba05f285bceed869e510e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit99d3067f554ba05f285bceed869e510e::$classMap;

        }, null, ClassLoader::class);
    }
}

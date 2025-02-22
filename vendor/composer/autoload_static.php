<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitafe7e7ecc8bb51ca7bd3e222f7486b69
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitafe7e7ecc8bb51ca7bd3e222f7486b69::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitafe7e7ecc8bb51ca7bd3e222f7486b69::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitafe7e7ecc8bb51ca7bd3e222f7486b69::$classMap;

        }, null, ClassLoader::class);
    }
}

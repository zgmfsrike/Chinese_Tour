<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8eac1085e43d29b8c35f2d5bc7e188f5
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8eac1085e43d29b8c35f2d5bc7e188f5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8eac1085e43d29b8c35f2d5bc7e188f5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

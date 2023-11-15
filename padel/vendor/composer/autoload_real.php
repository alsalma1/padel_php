<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitedb1bc6deaa158b1d86d65d831b185ed
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitedb1bc6deaa158b1d86d65d831b185ed', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitedb1bc6deaa158b1d86d65d831b185ed', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitedb1bc6deaa158b1d86d65d831b185ed::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

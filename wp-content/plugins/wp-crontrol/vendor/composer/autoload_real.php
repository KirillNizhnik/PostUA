<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit62e0e156461f136eb1f6faca04e5a55f
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

        spl_autoload_register(array('ComposerAutoloaderInit62e0e156461f136eb1f6faca04e5a55f', 'loadClassLoader'), true, false);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit62e0e156461f136eb1f6faca04e5a55f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit62e0e156461f136eb1f6faca04e5a55f::getInitializer($loader));

        if (method_exists($loader,"setClassMapAuthoritative")){
            $loader->setClassMapAuthoritative(true);
        }
        $loader->register(false);

        return $loader;
    }
}

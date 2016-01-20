<?php

class Template
{
    public static function render($template, $variables)
    {
        require_once root . '/application/components/twig/lib/twig/Autoloader.php';

        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem(view);
        $twig = new Twig_Environment($loader);

        echo $twig->render($template, $variables);
    }
}
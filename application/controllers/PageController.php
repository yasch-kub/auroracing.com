<?php

class PageController
{
    public static function ActionMain()
    {
        $variables = [
            'template' => 'events.php',
            'links' => ['slider.css']
        ];

        $variables = array_replace_recursive(self::getMainVariables(), $variables);
        Template::render('template.php', $variables);
    }

    public static function getMainVariables()
    {
        return [
            'scripts' => [
                'authorization.js'
            ],
            'user' => [
                'isLoggedIn' => UserModel::isUserLoggedIn(),
                'name' => UserModel::getUserLogin()
            ]
        ];
    }
}
<?php

class PageController
{
    public static function ActionMain($id)
    {
        $post = PostModel::getPostsById($id);
        $post['id'] = $id;
        $variables = [
            'template' => 'events.php',
            'links' => ['slider.css', 'events.css'],
            'scripts' => ['slider.js'],
            'post' => $post,
            'postCount' => PostModel::getPostsCount()
        ];

        $variables = array_merge_recursive(self::getMainVariables(), $variables);
        Template::render('template.php', $variables);
    }

    public static function getMainVariables()
    {
        return [
            'scripts' => [
                'authorization.js'
            ],
            'user' => [
                'isAdmin' => AdminModel::isAdmin(),
                'isLoggedIn' => UserModel::isUserLoggedIn(),
                'name' => UserModel::getUserLogin(),
                'id' => UserModel::getUserId(),
                'theme' => UserModel::getUserThemeFromDb()
            ],
            'theme' => PageModel::getStandartTheme()
        ];
    }

    public static function ActionAddPost()
    {
        if (UserModel::isUserLoggedIn()) {
            $variables = [
                'template' => 'postForm.php',
                'scripts' => ['fileUploader.js']
            ];

            $variables = array_merge_recursive(self::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionMessages()
    {
        $variables = [
            'template' => 'messages.php',
            'links' => ['messages.css']
        ];

        $variables = array_merge_recursive(self::getMainVariables(), $variables);
        Template::render('template.php', $variables);
    }
}
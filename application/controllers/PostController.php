<?php

class PostController
{
    // TODO
    public static function ActionAddPost()
    {
        if (UserModel::isUserLoggedIn() and isset($_POST['title'])
            and isset($_POST['header'])
            and isset($_POST['content'])
            and isset($_POST['photos'])) {
            $title = $_POST['title'];
            $header = $_POST['header'];
            $text = $_POST['content'];
            $photos = json_decode($_POST['photos']);
            PostModel::addPost($title, $header, $text, $photos);
        }

        header('Location: /event/' . PostModel::getPostsCount());
    }

    // TODO
    public static function ActionPublishPost($postId)
    {
        PostModel::publishPost($postId);
    }

    // TODO
    public static function ActionAddUserSurvey($postId)
    {

    }

    public static function ActionSavePostImages()
    {
        if(UserModel::isUserLoggedIn())
        {
            $path = root . '/application/data/posts/temp/';
            if (!file_exists($path))
                mkdir($path);
            exit(json_encode(self::fileUpload($path)));
        }
    }

    public static function ActionAddComment($postId)
    {
        if (UserModel::isUserLoggedIn() and isset($_POST['text']))
        {
            $text = $_POST['text'];
            PostModel::addComment($postId, $text);
        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public static function fileUpload($path)
    {
        $images = [];
        $nFiles = count(scandir($path)) - 2;

        foreach ($_FILES['files']['name'] as $index => $name) {
            $extension = array_pop(explode('.', $name));
            $name = strval(++$nFiles) . '.' . $extension;
            if ($_FILES['files']['error'][$index] == UPLOAD_ERR_OK
                and move_uploaded_file($_FILES['files']['tmp_name'][$index], $path . '/' . $name)
            ) {
                $images[] = $name;
            }
        }

        return $images;
    }
}
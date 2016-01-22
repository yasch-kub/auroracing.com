<?php

class UserController
{
    public static function ActionRegistration()
    {
        if (isset($_POST['login'])
            and isset($_POST['email'])
            and isset($_POST['password'])
            and isset($_POST['passwordConfirm'])
            and isset($_POST['g-recaptcha-response']))
        {
            $login = Validator::clear($_POST['login']);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            $userId = UserModel::addUser($login, $email, $password);

            $path = root . '/application/data/users/' . $userId;
            mkdir($path);
            copy(root . '/images/avatar.jpg', $path . '/avatar.jpg');
            UserModel::setUser($userId, $login, 1);
            exit(json_encode(['status' => 'ok']));
        }
        exit(json_encode(['status' => 'false']));
    }

    public static function ActionLogin()
    {
        if (isset($_POST['login'])
            and isset($_POST['password'])
        ) {
            $login = Validator::clear($_POST['login']);
            $password = $_POST['password'];

            $user = UserModel::isCorrectUser($login, $password);

            if ($user and !empty($user)) {
                UserModel::setUserLanguage($user['language']);
                $userId = $user['id'];
                $role = $user['role'];
                UserModel::setUser($userId, $login, $role);
                exit(json_encode(['status' => 'ok']));
            }
        }
        exit(json_encode(['status' => 'false']));
    }

    public static function ActionSignOut()
    {
        UserModel::LoggedOut();
        header("Location: /");
    }

    public static function ActionUserProfile($id)
    {
        if ($id == UserModel::getUserId())
            header('Location: /profile');
        else {
            $user = UserModel::getUser($id);
            $variables = [
                'template' => 'profile.php',
                'links' => ['profile.css'],
                'user' => [
                    'name' => UserModel::getUserLogin()
                ],
                'profile' => [
                    'id' => $id,
                    'email' => $user['email'],
                    'about' => $user['about'],
                ]
            ];

            $variables = array_replace_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
    }

    public static function ActionProfile()
    {
        $user = UserModel::getUser(UserModel::getUserId());
        if (UserModel::isUserLoggedIn()) {
            $variables = [
                'template' => 'profile.php',
                'links' => ['profile.css'],
                'scripts' => ['fileUploader.js'],
                'themes' => AdminModel::getThemes(),
                'profile' => [
                    'id' => UserModel::getUserId(),
                    'email' => $user['email'],
                    'about' => $user['about'],
                ]
            ];
            $variables = array_replace_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        } else
            header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionChangeAvatar()
    {
        $path = root . '/application/data/users/' . UserModel::getUserId() . '/';
        if (file_exists($path . 'avatar.png'))
            unlink($path . 'avatar.png');
        $image = self::fileUpload($path);
        exit('/application/data/users/' . UserModel::getUserId() . '/' . $image);
    }

    public static function fileUpload($path)
    {
        foreach ($_FILES['files']['name'] as $index => $name) {
            $extension = array_pop(explode('.', $name));
            $name = 'avatar.' . $extension;
            if ($_FILES['files']['error'][$index] == UPLOAD_ERR_OK
                and move_uploaded_file($_FILES['files']['tmp_name'][$index], $path . '/' . $name))
            {
                $image = $name;
                return $image;
            }
        }
    }

    public static function ActionChangeUserProfile()
    {
        if (isset($_POST['about'])
            and isset($_POST['email']))
        {
            $email = $_POST['email'];
            $about = $_POST['about'];
            UserModel::changeUserInfo($email, $about);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionChangeTheme()
    {
        if(UserModel::isUserLoggedIn() and isset($_POST['theme']))
        {
            $newTheme = $_POST['theme'];
            UserModel::changeTheme($newTheme);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionChangeLanguage()
    {
        if(UserModel::isUserLoggedIn())
        {
            $lang = $_POST['lang'];
            UserModel::changeUserLanguage($lang);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
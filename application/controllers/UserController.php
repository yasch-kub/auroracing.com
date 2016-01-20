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
            UserModel::setUser($userId, $login);
            exit(json_encode(['status' => 'ok']));
        }
        exit(json_encode(['status' => 'false']));
    }

    public static function ActionLogin()
    {
        if (isset($_POST['login'])
            and isset($_POST['password']))
        {
            $login = Validator::clear($_POST['login']);
            $password = $_POST['password'];

            $userId = UserModel::isCorrectUser($login, $password);
            if ($userId) {
                UserModel::setUser($userId, $login);
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

    public static function ActionProfile()
    {
        if (UserModel::isUserLoggedIn())
        {
            $variables = [
                'template' => 'profile.php',
                'links' => ['profile.css'],
                'user' => [
                    'name' => UserModel::getUserLogin()
                ]
            ];
            $variables = array_replace_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
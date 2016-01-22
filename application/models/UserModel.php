<?php

class UserModel
{
    public static function getUserId()
    {
        return isset($_SESSION['id']) ? $_SESSION['id'] : false;
    }

    public static function getUserLogin()
    {
        return isset($_SESSION['login']) ? $_SESSION['login'] : false;
    }

    public static function getUserTheme()
    {
        return isset($_SESSION['theme']) ? $_SESSION['theme'] : false;
    }

    public static function setUserTheme($name)
    {
        $_SESSION['theme'] = $name;
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['id']) ? true : false;
    }

    public static function LoggedOut()
    {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['role']);
        unset($_SESSION['theme']);
        unset($_SESSION['lang']);
    }

    public static function setUser($id, $login, $role)
    {
        $_SESSION['id'] = $id;
        $_SESSION['login'] = $login;
        $_SESSION['role'] = $role;
    }

    public static function isCorrectUser($login, $password)
    {
        $db = Db::connect();
        $query = "SELECT users.id, password, users.role, users.language FROM users WHERE users.login = :login";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($result)
            and password_verify($password, $result['password']))
            return $result;

        return false;
    }

    public static function getUserThemeFromDb()
    {
        $db = Db::connect();
        $query = "SELECT themes.file FROM users JOIN themes ON users.theme = themes.id AND users. id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', self::getUserId());
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['file'];
    }

    public static function addUser($login, $email, $password)
    {
        try {
            $db = Db::connect();
            $query = "INSERT INTO users(login, email, password) VALUES (:login, :email, :password)";

            $password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $db->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $query = "SELECT MAX(users.id) AS id FROM users";
            $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

            return $result['id'];

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getUser($id)
    {
        $db = Db::connect();
        $query = "SELECT users.about, users.email FROM users WHERE users.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public static function changeUserInfo($email, $about)
    {
        $db = Db::connect();
        $query = "UPDATE users SET about = :about, email = :email WHERE users.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', self::getUserId());
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':email', $email);
        $stmt->execute();$db = Db::connect();
        $query = "UPDATE users SET about = :about, email = :email WHERE users.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', self::getUserId());
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    public static function changeTheme($newTheme)
    {
        $db = Db::connect();

        $query = "UPDATE users SET users.theme = :theme WHERE users.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':theme', $newTheme);
        $stmt->bindValue(':id', self::getUserId());
        $stmt->execute();
    }

    public static function getUserLanguage()
    {
        return isset($_SESSION['lang']) ? $_SESSION['lang'] : 'eng';
    }

    public static function changeUserLanguage($lang)
    {
        UserModel::setUserLanguage($lang);

        $db = Db::connect();

        $query = "UPDATE users SET users.language = :language WHERE users.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':language', $lang);
        $stmt->bindValue(':id', self::getUserId());
        $stmt->execute();
    }

    public static function setUserLanguage($lang)
    {
        $_SESSION['lang'] = $lang;
    }
}
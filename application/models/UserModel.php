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

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['id']) ? true : false;
    }

    public static function LoggedOut()
    {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
    }

    public static function setUser($id, $login)
    {
        $_SESSION['id'] = $id;
        $_SESSION['login'] = $login;
    }

    public static function isCorrectUser($login, $password)
    {
        $db = Db::connect();
        $query = "SELECT users.id, password FROM users WHERE users.login = :login";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($result)
            and password_verify($password, $result['password']))
            return $result['id'];

        return false;
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
}
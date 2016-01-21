<?php

class AdminModel
{
    public static function isAdmin()
    {
        return isset($_SESSION['role']) and $_SESSION['role'] == '3' ? true : false;
    }

    public static function getUsers()
    {
        $db = Db::connect();
        $query = "SELECT * FROM users";
        $result = $db->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function changeUserRole($id, $role)
    {
        $db = Db::connect();
        $query = "UPDATE users SET users.role = :role WHERE users.id = :id";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':role', $role);

        $stmt->execute();
    }

    public static function deleteUser($id)
    {
        $db = Db::connect();
        $query = "DELETE FROM users WHERE users.id = :id";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

    public static function getThemes()
    {
        $db = Db::connect();
        $query = "SELECT * FROM themes WHERE themes.id > 1";
        $result = $db->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function SaveThemeToDb($file, $name)
    {
        $db = Db::connect();
        $query = "INSERT INTO themes(name, file) VALUES(:name, :file)";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':file', $file);

        $stmt->execute();
    }

    public static function changeStandartTheme($newTheme)
    {
        $db = Db::connect();

        $query = "SELECT * FROM themes WHERE themes.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $newTheme);
        $stmt->execute();

        $theme = $stmt->fetch(PDO::FETCH_ASSOC);

        $query = "UPDATE themes SET themes.name = :name, themes.file = :file WHERE themes.id = 1";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':name', $theme['name']);
        $stmt->bindValue(':file', $theme['file']);
        $stmt->execute();
    }
}
<?php

class AdminController
{
    public static function ActionAdminPanel()
    {
        if(AdminModel::isAdmin())
            header('Location: /adminPanel/users');
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionUsers()
    {
        if(AdminModel::isAdmin())
        {
            $variables = [
                'template' => 'panel.php',
                'panel_template' => 'admin_users.php',
                'users' => AdminModel::getUsers()
            ];

            $variables = array_merge_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionThemes()
    {
        if(AdminModel::isAdmin())
        {
            $variables = [
                'template' => 'panel.php',
                'panel_template' => 'admin_themes.php',
                'themes' => AdminModel::getThemes()
            ];

            $variables = array_merge_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionDeleteUser($id)
    {
        if(AdminModel::isAdmin())
            AdminModel::deleteUser($id);
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionChangeUserRole($id)
    {
        if(AdminModel::isAdmin())
        {
            $role = $_POST['role'];
            AdminModel::changeUserRole($id, $role);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionAddTheme()
    {
        if(AdminModel::isAdmin() and isset($_POST['name']))
        {
            $name = $_POST['name'];
            $path = root . '/css/theme';
            $themes = self::themeUpload($path);
            AdminModel::SaveThemeToDb($themes, $name);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionChangeStandartTheme()
    {
        if(AdminModel::isAdmin() and isset($_POST['theme']))
        {
            $newTheme = $_POST['theme'];
            AdminModel::changeStandartTheme($newTheme);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function themeUpload($path) {
        foreach ($_FILES['files']['name'] as $index => $name) {
            if ($_FILES['files']['error'][$index] == UPLOAD_ERR_OK
                and move_uploaded_file($_FILES['files']['tmp_name'][$index], $path . '/' . $name))
            {
                return $name;
            }
        }
    }
}
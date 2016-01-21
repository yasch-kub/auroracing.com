<?php

class PageModel
{
    public static function getStandartTheme()
    {
        $db = Db::connect();

        $query = "SELECT themes.file FROM themes WHERE themes.id = 1";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result['file'];
    }
}
<?php

class ChatController
{
    public static function ActionSaveMessage($chatId)
    {
        ChatModel::saveMessage($chatId, 1, $_POST['message']);
        exit('ok');
        if (UserModel::isUserLoggedIn()
            and ChatModel::isUserInChat($chatId, UserModel::getUserId()))
        {

        }
    }

    public static function ActionConnecting($chatId)
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        while(true) {
            echo "data: ghjghj" . PHP_EOL;
        }

    }
}
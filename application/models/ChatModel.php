<?php

class ChatModel
{
    // TODO
    public static function isUserInChat($chatId, $userId)
    {
        return true;
    }

    public static function saveMessage($chatId, $userId, $message)
    {
        $message = Validator::clear($message);

        try{
            $db = Db::connect();
            $query = "INSERT INTO messages(text, chat_id, user_id, date) VALUES (:text, :chat_id, :user_id, NOW())";

            $stmt = $db->prepare($query);
            $stmt->bindParam(':text', $message);
            $stmt->bindParam(':chat_id', $chat_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

    }
}
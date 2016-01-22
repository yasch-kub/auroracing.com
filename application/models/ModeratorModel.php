<?php

class ModeratorModel
{
    public static function isModerator()
    {
        return isset($_SESSION['role']) and $_SESSION['role'] == '2' ? true : false;
    }

    public static function getAllUnpublishedPosts()
    {
        $db = Db::connect();
        $query = "SELECT posts.id, posts.title, posts.header, posts.text, users.login
            FROM posts JOIN users ON posts.author = users.id AND posts.status = 0";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getPostsId()
    {
        $db = Db::connect();
        $query = "SELECT posts.id FROM posts";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function addQuiz($postId, $question, $answers)
    {
        $db = Db::connect();
        $query = "INSERT INTO quizes(question, post_id) VALUES(:question, :post_id)";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();

        $query = "SELECT MAX(quizes.id) AS id FROM quizes";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];

        $query = "INSERT INTO quiz_answers(quiz_id, answer) VALUES(:id, :answer)";
        $stmt = $db->prepare($query);

        foreach($answers as $answer) {
            $stmt->bindParam(':answer', $answer);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }
}
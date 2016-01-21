<?php

class PostModel
{
    public static function publishPost($postId)
    {
        $db = Db::connect();

        $query = "UPDATE posts SET status = 1 WHERE posts.id = :postId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':postId', $postId);
        $stmt->execute();
    }

    public static function getPostsCount()
    {
        $db = Db::connect();

        $query = "SELECT COUNT(1) AS count FROM posts";
        $result = $db->query($query);
        $result = $result->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    public static function getPostsById($postId)
    {
        $db = Db::connect();

        $query = sprintf("SELECT posts.id, posts.title, posts.header, posts.text, posts.date, users.login, users.id as authorId, posts.date
            FROM posts
            JOIN users ON users.id = posts.author
            WHERE posts.id = '%s'", $postId);
        $result = $db->query($query);
        $result = $result->fetch(PDO::FETCH_ASSOC);


        $post = $result;
        $post['author'] = [
            'login' => $post['login'],
            'id' => $post['authorId']
        ];

        unset($post['login']);
        unset($post['authorId']);

        $query = sprintf("SELECT photo FROM post_photos WHERE post_photos.post_id = '%s'", $postId);
        $result = $db->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $photo) {
            $post['photos'][] = $photo['photo'];
        }

        $query = sprintf("SELECT comments.text, comments.date, users.login, users.id
            FROM comments
            JOIN users ON comments.author = users.id WHERE comments.post = '%s'", $postId);
        $result = $db->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $comment) {
            $post['comments'][] = $comment;
        }

        return $post;
    }

    public static function addPost($title, $header, $text, $photos)
    {
        $db = Db::connect();

        $query = "INSERT INTO posts(title, header, text, author, date) VALUES(:title, :header, :text, :author, :date)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':header', $header);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':author', UserModel::getUserId());
        $stmt->bindParam(':date', date('jS \of F Y h:i:s A'));

        $stmt->execute();

        $postNumber = intval(self::getPostsCount());
        $path = root . '/application/data/posts/';
        mkdir($path . $postNumber);

        $query = "INSERT INTO post_photos(post_id, photo) VALUES(:post_id, :photo)";
        $stmt = $db->prepare($query);
        foreach($photos as $photo) {
            $stmt->bindParam(':post_id', $postNumber);
            $stmt->bindParam(':photo', $photo);
            $stmt->execute();

            rename($path . 'temp/' . $photo, $path . $postNumber . '/' . $photo);
        }
    }

    public static function addComment($postId, $text)
    {
        $db = Db::connect();

        $query = "INSERT INTO comments(author, post, text, date) VALUES(:author, :post, :text, :date)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':author', UserModel::getUserId());
        $stmt->bindParam(':post', $postId);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':date', date('jS \of F Y h:i:s A'));

        $stmt->execute();
    }
}
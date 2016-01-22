<?php

class ModeratorController
{
    public static function ActionModeratorPanel()
    {
        if(ModeratorModel::isModerator())
            header('Location: /moderatorPanel/posts');
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionPosts()
    {
        if(ModeratorModel::isModerator())
        {
            $variables = [
                'template' => 'panel.php',
                'panel_template' => 'moderator_posts.php',
                'posts' => ModeratorModel::getAllUnpublishedPosts()
            ];

            $variables = array_merge_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionPublishPost($id)
    {
        if(ModeratorModel::isModerator())
            PostModel::publishPost($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionDeletePost($id)
    {
        if(ModeratorModel::isModerator())
            PostModel::deletePost($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionQuiz()
    {
        if(ModeratorModel::isModerator()) {
            $variables = [
                'template' => 'panel.php',
                'panel_template' => 'moderator_quiz.php',
                'postsId' => ModeratorModel::getPostsId()
            ];


            $variables = array_merge_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionCreateQuiz()
    {
        if(ModeratorModel::isModerator() and isset($_POST['id']) and isset($_POST['number'])) {
            $variables = [
                'template' => 'panel.php',
                'panel_template' => 'moderator_create_quiz.php',
                'id' => $_POST['id'],
                'number' => $_POST['number']
            ];

            $variables = array_merge_recursive(PageController::getMainVariables(), $variables);
            Template::render('template.php', $variables);
        }
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function ActionAddQuiz($postId)
    {
        if(ModeratorModel::isModerator()) {
            $number = count($_POST) - 1;
            $answers = [];
            for ($i = 1; $i <= $number; $i++)
                $answers[] = $_POST['answer' . $i];
            $question = $_POST['question'];
            var_dump($answers);
            ModeratorModel::addQuiz($postId, $question, $answers);
        }
        header('Location: moderatorPanel/quiz');
    }
}
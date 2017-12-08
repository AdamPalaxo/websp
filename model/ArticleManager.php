<?php

class ArticleManager
{
    // Registers new user
    public function addArticle($title, $description, $attachment, $author)
    {

        $article = array(
            'title' => $title,
            'description' => $description,
            'approved' => 0,
            'attachment' => $attachment,
            'author' => $author,
            'state' => "waiting_for_approval"
        );

        try
        {
            Db::insert('article', $article);
        }
        catch(PDOException $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function getAllArticles()
    {
        return Db::queryAll('
                        SELECT `id`, `title`, `description`, `approved`, `attachement`, `author`, `state`
                        FROM `article`');
    }

}
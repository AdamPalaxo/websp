<?php

/**
 * Class ArticleManager provides methods for managing articles.
 */
class ArticleManager
{
    /** Adds new article.
     *
     * @param string $title
     * @param string $description
     * @param int $file
     * @param string $author
     */
    public function addArticle($title, $description,  $file, $author, $creators)
    {

        $article = array(
            'title' => $title,
            'description' => $description,
            'approved' => 0,
            'file' => $file,
            'author' => $author,
            'creators' => $creators,
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

    /**
     * Gets all articles.
     *
     * @return mixed all articles
     */
    public function getAllArticles()
    {
        return Db::queryAll('
                        SELECT `article`.`id`, `article`.`title`, `article`.`description`, `article`.`approved`, `article`.`file`, `article`.`creators`, `user`.`name` AS `author`
                        FROM `article`
                        INNER JOIN `user` ON `user`.`id` = `article`.`author`');
    }

    /**
     * Gets all articles with its reviews.
     *
     * @return mixed articles with its revies
     */
    public function getAllArticlesWithReviews()
    {
        return Db::queryAll('SELECT `article`.`id`, `article`.`title`, `user`.`username`, `review`.`id` AS `review`, `review`.`user_id`,
                        `reviewer`.`username` AS `reviewer`, `review`.`article_id`, 
                        `review`.`rating_originality`, `review`.`rating_theme`, `review`.`rating_language`, 
                        `review`.`rating_awesomeness`, `review`.`rating_style`, `article`.`state`,
                        FORMAT(`review`.`rating_originality` + `review`.`rating_theme` + `review`.`rating_language` +  `review`.`rating_awesomeness` +`review`.`rating_style`, "N2") / 5 AS `rating`,
                        (SELECT COUNT(*) FROM `review` WHERE `article`.`id` = `review`.`article_id`) AS `count`
                        FROM `article` LEFT JOIN `review` ON `article`.`id` = `review`.`article_id` 
                        INNER JOIN `user` ON `user`.`id` = `article`.`author`
                        LEFT JOIN `user` `reviewer` ON `reviewer`.`id` = `review`.`user_id`');
    }

    /**
     * Gets articles of given user
     *
     * @param int $userID ID of user
     * @return mixed articles of given user
     */
    public function getArticleByAuthor($userID)
    {
                return Db::queryAll('
                        SELECT `article`.`id`, `article`.`title`, `article`.`description`, `article`.`approved`, 
                        `article`.`file`, `article`.`author`, `article`.`creators`, `user`.`username`
                        FROM `article` INNER JOIN `user` ON `user`.`id` = `article`.`author`
                        WHERE `article`.`author` = ' . $userID . '');
    }

    /**
     * Gets article by its ID.
     *
     * @param int $id ID of article
     * @return mixed article with given ID
     */
    public function getArticleByID($id)
    {
        return Db::queryOne('
                SELECT * FROM article
                WHERE id = ?
        ', array($id));
    }

    /**
     * Gets number of articles.
     *
     * @return int number of articles
     */
    public function getArticleCount()
    {
        return Db::query('
                SELECT * FROM article');
    }

    /**
     * Gets file of article by its ID.
     *
     * @param int $id ID of article
     * @return mixed article with given ID
     */
    public function getFileOfArticle($id)
    {
        return Db::queryOne('
                SELECT  `file`.`id`, `file`.`filename`, `file`.`filetype`, `file`.`filesize`, `file`.`file` FROM `file`
                INNER JOIN `article` ON `file`.`id` = `article`.`file`
                WHERE `article`.`id` = ?', array($id));
    }

    /**
     * Updates article with new values.
     *
     * @param int $id ID of edited article
     * @param array $article data of updated article
     */
    public function updateArticle($id, $article)
    {
            Db::update('article', $article, 'WHERE id = ?', array($id));
    }

    /**
     * Deletes articles.
     *
     * @param int $id ID of deleted article
     */
    public function deleteArticle($id)
    {
        Db::query('
                DELETE FROM article
                WHERE id = ?
        ', array($id));
    }

}
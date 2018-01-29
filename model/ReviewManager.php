<?php

/**
 * Class ReviewManager provides methods for managing reviews.
 */
class ReviewManager
{
    /**
     * Adds new review in database.
     *
     * @param int $articleID ID of reviewed article
     * @param int $userID reviewer ID
     * @throws ReviewException if user already reviews article
     */
    public function addReview($articleID, $userID)
    {
        $review = array(
            'id' => '',
            'article_id' => $articleID,
            'user_id' => $userID,
            'rating_originality' =>  NULL,
            'rating_theme' => NULL,
            'rating_language' => NULL,
            'rating_awesomeness' => NULL,
            'rating_style' => NULL,
            'note' => '',
        );

        try
        {
            Db::insert('review', $review);
        }
        catch(PDOException $exception)
        {
            if ($exception->getCode() == '23000')
            {
                throw new ReviewException("Článek je již vybraným recenzentem recenzován!");
            }
            else
            {
                throw new PDOException();
            }
        }
    }

    /**
     * Returns all reviews.
     *
     * @return array array of all reviews
     */
    public function getAllReviews()
    {
        return Db::queryAll('
                        SELECT `id`, `article_id`, `user_id`, `rating_originality`, `rating_theme`, `rating_language`, `rating_awesomeness`, `rating_style`
                        FROM `review`');
    }

    /**
     * Returns reviews by given reviewer.
     *
     * @param int $userID ID of desired reviewer
     * @return array array of reviews by given user
     */
    public function getReviewByAuthor($userID)
    {
        return Db::queryAll('
                        SELECT `review`.`id`, `review`.`article_id`, `article`.`title` AS `title`, `review`.`rating_originality`, `review`.`rating_theme`, 
                        `review`.`rating_language`, `review`.`rating_awesomeness`, `review`.`rating_style`,
                        FORMAT(`rating_originality` + `rating_theme` + `rating_language` +  `rating_awesomeness` + `rating_style`, "N2") / 5 AS `rating`,
                        `article`.`approved` AS `approved`
                        FROM `review` 
                        INNER JOIN `article` ON `article`.`id` = `review`.`article_id`
                        WHERE `user_id` = ' . $userID . '');
    }

    /**
     * Returns review by given ID.
     *
     * @param int $ID ID of desired review
     * @return array of review
     */
    public function getReviewByID($ID)
    {
        return Db::queryOne('SELECT `review`.`id`, `review`.`article_id`, `review`.`user_id`, `review`.`rating_originality`, `review`.`rating_theme`, 
                        `review`.`rating_language`, `review`.`rating_awesomeness`, `review`.`rating_style`, `review`.`note`, `article`.`title`
                        FROM `review` 
                        INNER JOIN `article` ON `article`.`id` = `review`.`article_id`
                        WHERE `review`.`id` = ' . $ID . '');
    }

    public function getArticleNames($userID)
    {
        return Db::queryAll('
                        SELECT `review`.`id`, `review`.`article_id`, `review`.`user_id`, `article`.`title`
                        FROM `review` INNER JOIN `article` ON `review`.`article_id`=`article`.`id` WHERE `user_id` = ' . $userID . '');
    }

    /**
     * Gets reviews of given article.
     *
     * @param int $articleID ID of desired article.
     * @return array array of reviews of given article
     */
    public function getReviewByArticle($articleID)
    {
        return Db::queryAll('
                        SELECT `review`.`id`, `review`.`article_id`,`reviewer`.`name` AS `reviewer`, `review`.`rating_originality`, `review`.`rating_theme`, 
                        `review`.`rating_language`, `review`.`rating_awesomeness`, `review`.`rating_style`,
                        FORMAT(`rating_originality` + `rating_theme` + `rating_language` +  `rating_awesomeness` + `rating_style`, "N2") / 5 AS `rating`
                        FROM `review` 
                        INNER JOIN `user` `reviewer` ON `reviewer`.`id` = `review`.`user_id`
                        WHERE `review`.`article_id` = ' . $articleID . '');
    }

    /**
     * Returns number of reviews.
     *
     * @return int number of reviews
     */
    public function getReviewCount()
    {
        return Db::query('
                SELECT * FROM review');
    }

    /**
     * Updates review with new values.
     *
     * @param int $id ID of review
     * @param array $review data of updated review
     */
    public function updateReview($id, $review)
    {
        Db::update('review', $review, 'WHERE id = ?', array($id));
    }

    /**
     * Deletes review with given id.
     *
     * @param int $id id of review to delete
     */
    public function deleteReview($id)
    {
        Db::query('
                DELETE FROM review
                WHERE id = ?
        ', array($id));
    }
}
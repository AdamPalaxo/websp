<?php

/**
 * Class AdminController handles administration part of application.
 */
class AdminController extends BaseController
{

    /**
     * Process administration.
     * Loads articles with reviews.
     * Handles adding or removing reviews
     * also handles blocking or deleting
     * user accounts.
     *
     * @param array $parameters given parameters
     * @return void
     */
    public function process($parameters)
    {
        $this->heading['title'] = "Administrace";

        $this->checkUser(true);

        $articleManager = new ArticleManager();
        $authorManager = new AuthorManager();
        $reviewManager = new ReviewManager();

        $articles = $articleManager->getAllArticles();

        $articlesWithReviews = $this->loadArticlesWithReviews($articles);


        // Change article status
        if ($_POST)
        {
            if ($_GET['admin'] == 'changeapproved' && isset($_GET['id']))
            {
                $article = array(
                    'id' => '',
                    'title' => '',
                    'description' => '',
                    'approved' => '',
                    'file' => '',
                    'author' => '',
                );

                try
                {
                    $keys = array('approved');
                    $user= array_intersect_key($_POST, array_flip($keys));

                    $articleManager->updateArticle($_GET['id'], $user);

                    $this->addMessage("Statut článku byl úspěšně změněn.", "success");
                    $this->redirect('index.php?admin');

                }
                catch (UserException $ex)
                {
                    $this->addMessage($ex->getMessage(), "danger");
                }

            }
        }

        // Add review to reviewer
        if ($_GET['admin'] == 'addreview' && isset($_GET['articleid']) && isset($_GET['reviewer']))
        {

            try
            {
                $articleID = $_GET['articleid'];
                $reviewer = $_GET['reviewer'];
                $selectOption = $_POST['sel' . $articleID . 'Reviewer' . $reviewer];

                $user = $authorManager->getAuthorIdByName($selectOption);

                $reviewManager->addReview($articleID, $user['id']);

                $this->addMessage("Článek úspěšně přidělen k recenzování.", "success");
                $this->redirect("index.php?admin");
            }
            catch (ReviewException $ex)
            {
                $this->addMessage($ex->getMessage(), "warning");
                $this->redirect("index.php?admin");
            }
        }

        // Delete review
        if ($_GET['admin'] == 'deletereview'  && isset($_GET['id']))
        {
            try
            {
                $id = $_GET['id'];
                $reviewManager->deleteReview($id);
                $this->addMessage("Recenze úspěšně smazána.", "success");
                $this->redirect("index.php?admin");
            }
            catch (ReviewException $ex)
            {
                $this->addMessage($ex->getMessage(), "danger");
            }
        }


        $this->data['articles'] = $articlesWithReviews;
        $this->data['users'] = $authorManager->getAllUsers();
        $this->data['reviewers'] = $authorManager->getAllReviewers();
        $this->data['counts'] = array('users' => $authorManager->getUerCount(), 'articles' => $articleManager->getArticleCount(), 'reviews' => $reviewManager->getReviewCount());

        $this->view = 'admin';
    }

    /**
     * Loads articles with reviews.
     *
     * @param array $articles articles which reviews we want to find
     * @return array articles with reviews
     */
    public function loadArticlesWithReviews($articles)
    {
        $reviewManager = new ReviewManager();
        $articlesWithReviews = array();
        $i = 0;

        foreach ($articles as $article)
        {
            $reviewsOfArticle = $reviewManager->getReviewByArticle($article['id']);

            $article['reviewCount'] = count($reviewsOfArticle);
            $article['reviews'] = $reviewsOfArticle;

            $articlesWithReviews[$i] = $article;

            $i++;
        }

        return $articlesWithReviews;

    }
}
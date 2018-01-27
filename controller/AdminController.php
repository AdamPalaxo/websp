<?php

class AdminController extends BaseController
{

    /**
     * Process administration.
     * Loads articles with reviews.
     * Handles adding or removing reviews
     * also handles blocking or deleting
     * user accounts.
     *
     * @param $parameters
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


        // Change user attributes or change article status
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

            if($_GET['admin'] == 'changeuser' && isset($_GET['id']))
            {
                $user = array(
                    'id' => '',
                    'username' => '',
                    'password' => '',
                    'name' => '',
                    'email' => '',
                    'active' => '',
                    'role' => '',
                );




                if (isset($_POST['role']))
                {
                    try
                    {
                        $keys = array('role');
                        $user= array_intersect_key($_POST, array_flip($keys));

                        $authorManager->updateUser($_GET['id'], $user);

                        $this->addMessage('Role uživatele byla úspěšně změněna.', 'success');
                        $this->redirect('index.php?admin');

                    }
                    catch (UserException $ex)
                    {
                        $this->addMessage($ex->getMessage(), "danger");
                    }
                }
                elseif (isset($_POST['active']))
                {
                    try
                    {
                        $keys = array('active');
                        $user= array_intersect_key($_POST, array_flip($keys));

                        $authorManager->updateUser($_GET['id'], $user);

                        $this->addMessage('Aktivita uživatelského účtu byla úspěšně změněna.', 'success');
                        //$this->redirect('index.php?admin');

                    }
                    catch (UserException $ex)
                    {
                        $this->addMessage($ex->getMessage(), "danger");
                    }
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
            catch (ArticleException $ex)
            {
                $this->addMessage($ex->getMessage(), "danger");
            }
        }

        // Delete user
        if ($_GET['admin'] == 'deleteuser' && isset($_GET['id']))
        {
            try
            {
                $id = $_GET['id'];
                $authorManager->deleteUser($id);
                $this->addMessage("Uživatel úspěšně smazán.", "success");
                $this->redirect("index.php?admin");
            }
            catch (ArticleException $ex)
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
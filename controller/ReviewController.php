<?php

/**
 * Class ReviewController handles reviewing of the articles.
 */
class ReviewController extends BaseController
{
    /**
     * Edits review of the article
     * and download the file of article.
     *
     * @param array $parameters
     * @return mixed|void
     */
    public function process($parameters)
    {
        $this->heading['title'] = "Seznam příspěvků k posouzení";

        $this->checkUser();

        if ($_SESSION['user']['role'] != 'recenzent')
        {
            $this->addMessage('Nedostatečná oprávnění!', 'warning');
            $this->redirect('index.php');
        }

        $reviewManager = new ReviewManager();
        $articleManager = new ArticleManager();

        // Posting edited review
        if ($_POST)
        {
            try
            {
                $review = array(
                    'id' => '',
                    'article_id' => '',
                    'user_id' => '',
                    'rating_originality' => '',
                    'rating_theme' => '',
                    'rating_language' => '',
                    'rating_awesomeness' => '',
                    'rating_style' => '',
                    'note' => '',
                );

                $keys = array('rating_originality', 'rating_theme', 'rating_language', 'rating_awesomeness', 'rating_style', 'note');

                $review = array_intersect_key($_POST, array_flip($keys));

                $reviewManager->updateReview($_POST['id'], $review);

                $this->addMessage('Recenze byla úspěšně uložena.', 'success');
                $this->redirect('index.php?review');

            }
            catch (Exception $ex)
            {
                echo $ex->getMessage();
            }
        }

        // Editing review
        if ($_GET['review'] == 'edit' && isset($_GET['id']))
        {
            try
            {
                $this->heading['title'] = "Editace posudku";
                $this->data['review'] = $reviewManager->getReviewByID($_GET['id']);

                $this->view = "edit";
            }
            catch (ArticleException $ex)
            {
                $this->addMessage($ex->getMessage(), "error");
            }
        }
        elseif ($_GET['review'] == 'download' && isset($_GET['id']))
        {
            $file = $articleManager->getFileOfArticle($_GET['id']);

            header("Content-length: {$file['filesize']}");
            header("Content-type: {$file['filetype']}");
            header("Content-Disposition: attachment; filename={$file['filename']}");
            echo $file['file'];
            exit;
        }
        else
        {
            $this->data['reviews'] = $reviewManager->getReviewByAuthor($_SESSION['user']['id']);
            $this->view = "reviews";
        }

    }
}
<?php

/**
 * Class PdfController handles showing of PDF
 * file of the article.
 */
class PdfController extends BaseController
{
    /**
     * Shows PDF file of the article.
     *
     * @param array $parameters given parameters
     * @return mixed
     */
    function process($parameters)
    {
        if (isset($_POST['id']))
        {
            $articleManager = new ArticleManager();
            $file = $articleManager->getFileOfArticle($_POST['id']);

            echo $file['filename'];

            header("Content-Type:" . $file['filetype']);
            header('Content-Disposition: inline; filename="' . $file['filename'] . '"');

            $this->heading['title'] = $file['filename'];

            echo $file['file'];
        }
        else
        {
            $this->redirect("index.php?page=intro");
        }

    }
}
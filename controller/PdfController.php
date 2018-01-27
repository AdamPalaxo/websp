<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 22.1.2018
 * Time: 13:56
 */

class PdfController extends BaseController
{

    /**
     * Main method of controller that
     * all other controllers extends.
     *
     * @param $parameters
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
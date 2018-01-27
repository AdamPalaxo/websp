<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 16.11.2017
 * Time: 11:24
 */

class PageController extends BaseController
{
    function process($parameters)
    {
        $articleManager = new ArticleManager();
        $this->data['articles'] = $articleManager->getAllArticles();

        $this->view = $_GET['page'];

        if (!file_exists("view/" . $_GET['page'] . ".html"))
        {
            $this->redirect('index.php?error=404');
        }
    }
}
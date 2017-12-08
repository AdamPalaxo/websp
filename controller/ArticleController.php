<?php

class ArticleController extends BaseController
{

    function process($parameters)
    {
        $this->heading['title'] = "Seznam příspěvků";

        $articleManager = new ArticleManager();

        if (!empty($parameters[0]))
        {

        }
        else
        {
            $articles = $articleManager->getAllArticles();
            $this->data['articles'] = $articles;
        }
    }
}
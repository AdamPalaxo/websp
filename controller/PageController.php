<?php

/**
 * Class PageController handles renders desired page
 * and sets its heading.
 */
class PageController extends BaseController
{
    /**
     * Renders desired page and sets
     * its title and description.
     *
     * @param array $parameters additional parameters
     * @return mixed|void
     */
    function process($parameters)
    {
        $articleManager = new ArticleManager();
        $pageManager = new PageManager();
        $page = null;

        if (isset($_GET['page']))
        {
            $page = $pageManager->getPage($_GET['page']);
        }

        if (!$page)
        {
            $this->redirect('index.php?error=404');
        }

        $this->heading['title'] = $page['title'];
        $this->heading['description'] = $page['description'];
        $this->heading['keywords'] = $page['keywords'];

        $this->data['articles'] = $articleManager->getAllArticles();

        $this->view = $_GET['page'];

    }
}
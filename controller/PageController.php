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
        $pageManager = new PageManager();

        $page = $pageManager->getPage($parameters[0]);

        if(!$page)
        {
            $this->redirect('error');
        }

        $this->heading = array(
            'title' => $page['title'],
            'keywords' => $page['keywords'],
            'description' => $page['description'],
        );

        $this->data['title'] = $page['title'];
        $this->data['content'] = $page['content'];

        $this->view = 'page';
    }
}
<?php

class PaperController extends BaseController
{
    public function process($parameters)
    {
        $this->view = "papers";

        if($_POST)
        {
            try
            {
                $articleManager = new ArticleManager();
                $articleManager->addArticle($_POST['title'], $_POST['description'], $_POST['attachment'], $_POST['author']);
                $this->addMessage("Článek úspěšně přidán.");
                //$this->redirect("page/intro");
            }
            catch (UserException $ex)
            {
                $this->addMessage($ex->getMessage());
            }
        }

    }
}
<?php

/**
 * Class ArticleController views and/or edits existing articles.
 */
class ArticleController extends BaseController
{
    /**
     * Views and/or edits existing articles.
     *
     * @param $parameters
     * @return mixed|void
     */
    function process($parameters)
    {
        $this->checkUser();

        $this->heading['title'] = "Seznam příspěvků";

        $articleManager = new ArticleManager();

        // Viewing article with given ID
        if ($_GET['article'] == 'edit' && isset($_GET['id']))
        {
            $article = $articleManager->getArticleByID($_GET['id']);

            if (empty($article))
            {
                $this->addMessage("Vybraný příspěvek nenalezen.", "warning");
                $this->redirect('index.php?paper');
            }
            else
            {
                if ($_SESSION['user']['id'] == $article['author'])
                {
                    $this->data['article'] = $articleManager->getArticleByID($_GET['id']);
                    $this->data['file'] = $articleManager->getFileOfArticle($_GET['id']);
                    $this->heading['title'] = "Editace přípěvku";
                    $this->view = 'article';
                }
                else
                {
                    $this->addMessage("Nemáte dostatečná opávění k editaci tohoto příspěvku.", "warning");
                    $this->redirect('index.php?paper');
                }
            }
        }
        else
        {
            $this->redirect('index.php?error=404');
        }

        // Edit existing article
        if ($_POST)
        {

            try
            {
                $article = array(
                    'id' => '',
                    'title' => '',
                    'description' => '',
                    'approved' => '',
                    'file' => '',
                    'author' => '',
                    'creators' => '',
                );

                if ($_FILES['file']['error'] == 0)
                {
                    $oldFile = $articleManager->getFileOfArticle($_POST['id']);
                    $this->addFile($oldFile['id']);
                }

                $keys = array('title', 'description', 'creators');

                $article = array_intersect_key($_POST, array_flip($keys));

                $articleManager->updateArticle($_POST['id'], $article);

                $this->addMessage('Článek byl úspěšně uložen.', 'success');
                $this->redirect('index.php?paper');


            }
            catch (PDOException $ex)
            {
                $this->addMessage($ex->getMessage(), "danger");
            }
        }

    }

    /**
     * Loads new file, updates in DB a returns its ID.
     *
     * @param int $id ID of updated file
     */
    public function addFile($id)
    {
        $fileManager = new FileManager();

        $tmp_name = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        if ($fileSize > $_POST['MAX_FILE_SIZE'])
        {
            $this->addMessage("Překročena maximální velikost souboru 10MB.", "warning");
            $this->redirect("index.php?paper");
        }
        else if ($fileType != 'application/pdf')
        {
            $this->addMessage("Nejedná se o platný typ souboru.", "warning");
            $this->redirect("index.php?paper");
        }


        $fp = fopen($tmp_name, 'r');
        $content = fread($fp, filesize($tmp_name));
        fclose($fp);

        $fileManager->updateFile($id, $fileName, $fileSize, $fileType, $content);
    }

}
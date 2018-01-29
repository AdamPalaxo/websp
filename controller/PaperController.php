<?php

/**
 * Class PaperController handles adding or deleting of the article.
 */
class PaperController extends BaseController
{
    /**
     * Adds or deletes the article.
     *
     * @param array $parameters given parameters
     * @return mixed|void
     */
    public function process($parameters)
    {
        $this->checkUser();
        $this->heading['title'] = "Seznam příspěvků";

        if ($_SESSION['user']['role'] != 'autor')
        {
            $this->addMessage('Nemáte přístup k této sekci!', 'warning');
            $this->redirect('index.php');
        }

        $articleManager = new ArticleManager();
        $authorManager = new AuthorManager();

        // Adding article
        if($_POST)
        {
            try
            {
                $file = $this->loadFile();

                $articleManager->addArticle($_POST['title'], $_POST['description'], $file, $_SESSION['user']['id'], $_POST['creators']);
                $this->addMessage("Článek úspěšně přidán.", "success");
                $this->redirect("index.php?paper");
            }
            catch (ArticleException $ex)
            {
                $this->addMessage($ex->getMessage(), "error");
            }
        }

        // Deleting article
        if($_GET['paper'] == 'delete')
        {
            try
            {
                $id = $_GET['id'];
                $articleManager->deleteArticle($id);
                $this->addMessage("Článek úspěšně smazán.", "success");
                $this->redirect("index.php?paper");
            }
            catch (ArticleException $ex)
            {
                $this->addMessage($ex->getMessage(), "error");
            }
        }

        $this->data['articles'] = $articleManager->getArticleByAuthor($_SESSION['user']['id']);
        $this->data['authors'] = $authorManager->getAllAuthors();

        $this->view = "papers";
    }

    /**
     * Loads file, saves in DB a returns its ID.
     *
     * @return int ID file
     */
    public function loadFile()
    {
        $fileManager = new FileManager();

        $tmp_name = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        $fp = fopen($tmp_name, 'r');
        $content = fread($fp, filesize($tmp_name));
        fclose($fp);

        $fileManager->addFile($fileName, $fileSize, $fileType, $content);

        $file = Db::getLastID();

        return $file;
    }
}
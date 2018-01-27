<?php

class LoginController extends BaseController
{
    /**
     * Logs user in and redirects to proper page.
     *
     * @param array $parameters additional parameters
     * @return void
     */
    public function process($parameters)
    {
        $userManager = new UserManager();

        // Checks if user is already logged in
        if ($userManager->returnUser())
        {
            $this->userRedirect();
        }

        $this->heading['title'] = "Přihlášení";

        // Login part
        if ($_POST)
        {
            try
            {
                $userManager->login($_POST['username'], $_POST['password']);

                $user = $_SESSION['user'];

                if ($user['active'] == 0)
                {
                    $this->addMessage("Váš účet byl zablokován.", "warning");
                    $this->redirect("index.php?logout");
                }
                else
                {
                    $this->addMessage("Uživatel úspěšně přihlášen.", "success");
                    $this->userRedirect();
                }


            }
            catch (UserException $ex)
            {
                $this->addMessage($ex->getMessage(), "danger");
            }
        }

        $this->view = "login";
    }

    /**
     * Redirects user to proper page
     * according to his rights.
     */
    public function userRedirect()
    {
        $user = $_SESSION['user'];

        if ($user['role'] == 'autor')
        {
            $this->redirect("index.php?paper");
        }
        elseif (($user['role'] == 'recenzent'))
        {
            $this->redirect("index.php?review");
        }
        else
        {
            $this->redirect("index.php?admin");
        }
    }
}





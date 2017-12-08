<?php

class LoginController extends BaseController
{

    function process($parameters)
    {
        $userManager = new UserManager();

        if($userManager->returnUser())
        {
            $this->redirect("admin");
        }

        $this->heading['title'] = "Přihlášení";

        if($_POST)
        {
            try
            {
                $userManager->login($_POST['username'], $_POST['password']);
                $this->addMessage("Uživatel úspěšně přihlášen");
                $this->redirect("admin");

            }
            catch (UserException $ex)
            {
                $this->addMessage($ex->getMessage());
            }
        }

        $this->view = "login";
    }
}





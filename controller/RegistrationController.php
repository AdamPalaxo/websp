<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 16.11.2017
 * Time: 11:24
 */

class RegistrationController extends BaseController
{

    /**
     * Registers new user.
     *
     * @param array $parameters additional parameters
     * @return void
     */
    function process($parameters)
    {
        $this->heading['title'] = "Registrace";

        if ($_POST)
        {
            try
            {
                $userManager = new UserManager();
                $userManager->register($_POST['username'], $_POST['password'], $_POST['passwordagain'], $_POST['name'], $_POST['email']);
                $userManager->login($_POST['username'], $_POST['password']);
                $this->addMessage("Byl jste úspěšně registrován.", "success");
                $this->redirect("index.php?page=intro");
            }
            catch (UserException $ex)
            {
                $this->addMessage($ex->getMessage(), "danger");
            }
        }

        $this->view = "register";
    }
}
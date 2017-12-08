<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 16.11.2017
 * Time: 11:24
 */

class RegistrationController extends BaseController
{

    function process($parameters)
    {
        $this->heading['title'] = "Registrace";

        if($_POST)
        {
            try
            {
                $userManager = new UserManager();
                $userManager->register($_POST['username'], $_POST['password'],  $_POST['passwordagain']);
                $userManager->login($_POST['username'], $_POST['password']);
                $this->addMessage("Byl jste úspěšně registrován.");
                $this->redirect("page/intro");

            }
            catch (UserException $ex)
            {
                $this->addMessage($ex->getMessage());
            }
        }

        $this->view = "register";
    }
}
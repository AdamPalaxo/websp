<?php

/**
 * Class LogoutController handles logout of user.
 */
class LogoutController extends BaseController
{
    /**
     * Logs out user.
     *
     * @param array $parameters additional parameters
     * @return void
     */
    public function process($parameters)
    {
        $userManager = new UserManager();

        $user = $userManager->returnUser();

        if ($user)
        {
            $userManager->logout();
            $this->addMessage("Byl jste úspěšně odhlášen.", "success");
            $this->redirect("index.php?page=intro");
        }

        $this->view = "index";
    }
}
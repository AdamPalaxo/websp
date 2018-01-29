<?php

/**
 * Class AjaxController handles AJAX requests mainly in administration.
 */
class AjaxController extends BaseController
{
    /**
     * Handles AJAX request mainly in administration.
     *
     * @param array $parameters given parameters
     * @return void
     */
    function process($parameters)
    {
        $authorManager = new AuthorManager();

        if ($_POST)
        {
            print_r($_GET);
            print_r($_POST);

            // Change user parameters
            if ($_GET['admin'] == 'changeuser' && isset($_GET['id']))
            {
                $user = array(
                    'id' => '',
                    'username' => '',
                    'password' => '',
                    'name' => '',
                    'email' => '',
                    'active' => '',
                    'role' => '',
                );

                if (isset($_POST['role']))
                {
                    try
                    {
                        $keys = array('role');
                        $user= array_intersect_key($_POST, array_flip($keys));

                        $authorManager->updateUser($_GET['id'], $user);
                    }
                    catch (UserException $ex)
                    {
                        $this->addMessage($ex->getMessage(), "danger");
                    }
                }
                elseif (isset($_POST['active']))
                {
                    try
                    {
                        $keys = array('active');
                        $user= array_intersect_key($_POST, array_flip($keys));

                        $authorManager->updateUser($_GET['id'], $user);

                    }
                    catch (UserException $ex)
                    {
                        $this->addMessage($ex->getMessage(), "danger");
                    }
                }
            }
        }

        // Delete user
        if ($_GET)
        {
            if ($_GET['admin'] == 'deleteuser' && isset($_GET['id']))
            {
                try
                {
                    $id = $_GET['id'];
                    $authorManager->deleteUser($id);

                    $this->redirect('index.php?admin');
                }
                catch (UserException $ex)
                {
                    $this->addMessage($ex->getMessage(), "danger");
                }
            }
        }

    }
}
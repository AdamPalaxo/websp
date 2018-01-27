<?php

class AuthorController extends BaseController
{
    public function process($parameters)
    {
        $authorManager = new AuthorManager();

        $users = $authorManager->getAllUsers();

        $this->data['users'] = $users;

        $this->view = "user";
    }
}
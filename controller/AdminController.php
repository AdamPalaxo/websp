<?php

class AdminController extends BaseController
{
    public function process($parameters)
    {
        $this->heading['title'] = "Administrace";

        $this->view = 'admin';
    }
}
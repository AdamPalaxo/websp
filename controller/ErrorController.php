<?php

class ErrorController extends BaseController
{
    function process($parameters)
    {
        header("HTTP/1.0 404 Not Found");
        $this->heading['title'] = 'Chyba 404';
        $this->view = 'error';
    }
}


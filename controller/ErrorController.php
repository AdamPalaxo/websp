<?php

/**
 * Class ErrorController handles routing to error page.
 */
class ErrorController extends BaseController
{
    /**
     * Routes to error page.
     *
     * @param array $parameters addition parameters
     * @return mixed|void
     */
    function process($parameters)
    {
        header("HTTP/1.0 404 Not Found");
        $this->heading['title'] = 'Chyba 404';
        $this->view = 'error';
    }
}


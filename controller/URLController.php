<?php

/**
 * Class RouterController is special type of controller
 * that by url calls right controller and puts in layout
 * view created by that controller.
 */
class URLController extends BaseController
{
    /** @var BaseController */
    protected $controller;

    /**
     * Parses url and creates proper controller.
     *
     * @param array $parameters
     * @return mixed|void
     */
    public function process($parameters)
    {
        $parsedURL = parse_url($parameters[0], PHP_URL_QUERY);
        $path = $this->parseURL($parsedURL);

        if (empty($parsedURL[0]))
        {
            $this->redirect("index.php?page=intro");
        }

        $controllerClass = $path[0] . 'Controller';

        if (file_exists('controller/' . $controllerClass. '.php'))
        {
            $this->controller = new $controllerClass;
        }
        else
        {
            $this->redirect("index.php?error=404");
        }

        $this->controller->process($path);


        $this->data['title'] = $this->controller->heading['title'];
        $this->data['keywords'] = $this->controller->heading['keywords'];
        $this->data['description'] = $this->controller->heading['description'];
        $this->data['messages'] = $this->returnMessages();

        $this->view = 'index';
    }

    /**
     * Parses url.
     *
     * @param string $parsedURL url to be parsed.
     * @return array parsed url
     */
    public function parseURL($parsedURL)
    {
        $path = array($parsedURL);

        if(strpos($parsedURL, "=") !== false)
        {
            $path = explode("=", $parsedURL);
        }

        return $path;
    }
}
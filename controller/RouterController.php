<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 16.11.2017
 * Time: 10:30
 */

class RouterController extends BaseController
{
    protected $controller;

    public function process($parameters)
    {
        $parsedURL = $this->parseURL($parameters[0]);

        if (empty($parsedURL[0]))
            $this->redirect('page/intro');

        $controllerClass = $this->makeReadableURL(array_shift($parsedURL)) . 'Controller';

        if (file_exists('controller/' . $controllerClass. '.php'))
            $this->controller = new $controllerClass;
        else
            $this->redirect("error");

        $this->controller->process($parsedURL);

        $this->data['title'] = $this->controller->heading['title'];
        $this->data['key_words'] = $this->controller->heading['key_words'];
        $this->data['description'] = $this->controller->heading['description'];

        $this->view = 'index';
    }

    private function parseURL($url)
    {
        $parsedURL = parse_url($url);
        $parsedURL["path"] = ltrim($parsedURL["path"], "/");
        $parsedURL["path"] = trim($parsedURL["path"]);

        $path = explode("/", $parsedURL["path"]);

        return $path;
    }

    private function makeReadableURL($text)
    {
        $line = str_replace('-', ' ', $text);

        $line = ucwords($line);
        $line = str_replace(' ', '', $line);

        return $line;
    }
}
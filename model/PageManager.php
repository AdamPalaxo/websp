<?php

class PageManager
{
    // Returns article with given URL
    public function getPage($url)
    {
        return Db::queryOne('
                        SELECT `id`, `title`, `content`, `url`, `description`, `keywords`
                        FROM `page`
                        WHERE `url` = ?
                ', array($url));
    }

    // Returns list of all articles
    public function getPages()
    {
        return Db::queryAll('
                        SELECT `id`, `title`, `url`, `description`
                        FROM `page`
                        ORDER BY `id` DESC
                ');
    }
}
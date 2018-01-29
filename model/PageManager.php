<?php

/**
 * Class PageManager provides methods for managing pages.
 */
class PageManager
{
    /**
     * Gets data of the page with given name.
     *
     * @param string $url name of the page
     * @return mixed
     */
    public function getPage($url)
    {
        return Db::queryOne('
                        SELECT `id`, `url`, `title`, `description`, `keywords`
                        FROM `page`
                        WHERE `url` = ?
                ', array($url));
    }

}
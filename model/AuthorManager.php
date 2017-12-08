<?php

class AuthorManager
{
    public function getAllAuthors()
    {
        return Db::queryAll('
                        SELECT `username`
                        FROM `user` WHERE `role` = "publisher"');
    }
}
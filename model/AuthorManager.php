<?php

/**
 * Class AuthorManager provides methods for managing authors.
 */
class AuthorManager
{

    /**
     * Returns all users.
     *
     * @return mixed array of all users
     */
    public function getAllUsers()
    {
        return Db::queryAll('
                        SELECT `id`, `username`, `name`, `email`, `role`, `active` 
                        FROM `user`');
    }

    /**
     * Returns all reviewers.
     *
     * @return mixed array of all reviewers
     */
    public function getAllReviewers()
    {
        return Db::queryAll('
                        SELECT `id`,`username`,`name`
                        FROM `user` WHERE `role` = "recenzent"');
    }

    /**
     * Returns all authors.
     *
     * @return mixed array of all authors
     */
    public function getAllAuthors()
    {
        return Db::queryAll('
                        SELECT `username`, `name`
                        FROM `user` WHERE `role` = "autor"');
    }

    /**
     * Returns author with given ID.
     *
     * @param int $id ID of author
     * @return mixed author with given ID
     */
    public function getAuthorByID($id)
    {
        return Db::queryOne('
                        SELECT `username`
                        FROM `user` WHERE `id` = ' . $id . '');
    }

    /**
     * Returns author with given username.
     *
     * @param string $username username of author
     * @return mixed author with given username
     */
    public function getAuthorIdByName($name)
    {
        return Db::queryOne('
                        SELECT `id`
                        FROM `user` WHERE `name` = ?'
                        , array($name));
    }

    /**
     * Gets number of
     *
     * @return int
     */
    public function getUerCount()
    {
        return Db::query('
                SELECT * FROM user');
    }

    /**
     * Updates user with new values.
     *
     * @param int $id ID of edited user
     * @param array $user data of updated user
     */
    public function updateUser($id, $user)
    {
        Db::update('user', $user, 'WHERE id = ?', array($id));
    }

    /**
     * Deletes user.
     *
     * @param int $id ID of deleted user
     */
    public function deleteUser($id)
    {
        Db::query('
                DELETE FROM `user`
                WHERE id = ?
        ', array($id));
    }

}
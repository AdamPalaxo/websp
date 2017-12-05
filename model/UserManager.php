<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 13.11.2017
 * Time: 23:32
 */

class UserManager
{
    public function encryptPassword($password)
    {
        password_hash($password, PASSWORD_BCRYPT);
    }

    // Registers new user
    public function register($username, $password, $passwordAgain)
    {
        if($password != $passwordAgain)
        {
            throw new UserException("Hesla nesouhlasí!");
        }

        $user = array(
            'username' => $username,
            'password' => $password,
        );

        try
        {

        }
        catch(PDOException $exception)
        {
            throw new UserException('Uživatel s tímto jménem je již registrovaný.');
        }
    }

    // Logs user into system
    public function login($username, $password)
    {

        $user = Db::queryOne('SELECT username, password, active, role
                                    FROM user WHERE username = ?',
                                    array($username));
        if($user)
        {
            if(!password_verify($password, $user['password']))
            {
                throw new UserException('Neplatné uživatelské jméno nebo heslo');
            }
        }
        else
        {
            throw new UserException('Neplatné uživatelské jméno nebo heslo');
        }

        $_SESSION['user'] = $user;
    }

    // Log outs user
    public function logout()
    {
        unset($_SESSION['user']);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 13.11.2017
 * Time: 23:32
 */

/**
 * Class UserManager provides methods for managing users.
 */
class UserManager
{
    /**
     * Encrypts user password.
     *
     * @param string $password password of user
     * @return bool|string encrypted password
     */
    public function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    // Registers new user
    public function register($username, $password, $passwordAgain, $name, $email)
    {
        if($password != $passwordAgain)
        {
            throw new UserException("Hesla nesouhlasí!");
        }

        $user = array(
            'username' => $username,
            'password' => $this->encryptPassword($password),
            'name' => $name,
            'email' => $email,
            'active' => 1,
            'role' => "autor"
        );

        try
        {
            Db::insert('user', $user);
        }
        catch(PDOException $exception)
        {
            echo $exception->getMessage();

            throw new UserException('Uživatel s tímto jménem je již registrovaný.');
        }
    }

    /**
     * Logs user in the system.
     *
     * @param string $username username of the user
     * @param string $password password of the user
     * @throws UserException thrown if name of password is invalid
     */
    public function login($username, $password)
    {

        $user = Db::queryOne('SELECT id, username, password, active, role
                                    FROM user WHERE username = ?',
                                    array($username));

        if(!$user || !password_verify($password, $user['password']))
        {
            throw new UserException('Neplatné uživatelské jméno nebo heslo.');
        }

        $_SESSION['user'] = $user;
    }

    /**
     * Logs out current user.
     */
    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function returnUser()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
        return null;
    }
}
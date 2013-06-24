<?php
/**
 * This file provides the userModel
 *
 * Created by Leo Bernard, more information at leolabs.org
 */

/**
 * The UserModel provides access to users in the database.
 */
class UserModel extends CI_Model
{
    var $userTable = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
    }

    /**
     * Generates a password hash for storing in the database and comparing with the entered password
     *
     * @param string $password the entered password
     *
     * @return string the hashed password
     */
    public function generatePasswordHash($password){
        return $this->encrypt->sha1($password . $this->config->item('encryption_key'));
    }

    /**
     * Gets information about a single user
     *
     * @param string $id the user's ID
     * @return array the user's information
     */
    public function getSingleUser($id)
    {
        return $this->db->get_where($this->userTable, array('ID' => $id))->result_array();
    }

    /**
     * Checks if the login is correct
     *
     * @param $username string the given username
     * @param $password string the given unhashed password
     * @return bool
     */
    public function tryLogin($username, $password){
        $username = strtolower($username);

        $filter = array(
            'Username' => $username,
            'PasswordHash' => $this->generatePasswordHash($password)
        );

        $res = $this->db->get_where($this->userTable, $filter);

        return array(($res->num_rows() > 0) ? true : false, $res->result_array());
    }
    /**
     * Checks if the login is correct by the user's ID
     *
     * @param $userID int the given user ID
     * @param $password string the given unhashed password
     * @return bool
     */
    public function tryLoginByID($userID, $password){
        $filter = array(
            'ID' => $userID,
            'PasswordHash' => $this->generatePasswordHash($password)
        );

        $res = $this->db->get_where($this->userTable, $filter);

        return ($res->num_rows() > 0) ? true : false;
    }

    /**
     * Returns the user's API key that can be used for accessing the database from outside of ExceptionBase.NET
     *
     * @param int $userID the user's ID
     * @return string the user's API key
     */
    public function getAPIKey($userID){
        $user = $this->db->get_where($this->userTable, array('ID' => $userID))->result_array();
        $apiKeyString = $user[0]['PasswordHash'] . $user[0]['UserLevel'] . $userID . 'API-Key';
        return $userID . '-' . strtolower(sha1($apiKeyString));
    }

    /**
     * Returns a list of all the users in the database
     *
     * @return array the list of users
     */
    public function getUserList()
    {
        return $this->db->get($this->userTable)->result_array();
    }

    /**
     * Adds an user to the database
     *
     * @param string $name the new user's name
     * @param string $mail the new user's mail address
     * @param string $level the new user's userlevel
     * @param string $password the unhashed password of the user
     *
     * @return array the insert status and the user's ID in the database
     */
    public function addUser($name, $mail, $level, $password)
    {
        $name = strtolower($name);

        $resCount = $this->db->get_where($this->userTable, array('Username' => $name))->num_rows();

        if($resCount > 0){
            return array(false, 0);
        }

        $data = array(
            'Username' => $name,
            'Mail' => $mail,
            'UserLevel' => $level,
            'PasswordHash' => $this->generatePasswordHash($password)
        );

        return array(true, $this->db->insert($this->userTable, $data));
    }

    /**
     * Changes the user's username and E-mail address
     *
     * @param int $userID the user's ID
     * @param string $username the new username
     * @param string $email the new E-mail address
     * @return int the count of rows affected
     */
    public function changeUserdata($userID, $username, $email){
        $this->db->where('ID', $userID)->update($this->userTable, array('Username' => $username, 'Mail' => $email));
        return $this->db->affected_rows();
    }

    /**
     * Changes the user's username and E-mail address
     *
     * @param int $userID the user's ID
     * @param int $userLevel the new username
     * @return int the count of rows affected
     */
    public function changeUserLevel($userID, $userLevel){
        $this->db->where('ID', $userID)->update($this->userTable, array('UserLevel' => $userLevel));
        return $this->db->affected_rows();
    }

    /**
     * Deletes the user's username and E-mail address
     *
     * @param int $userID the user's ID
     * @return int the count of rows affected
     */
    public function deleteUser($userID){
        $this->db->where('ID', $userID)->delete($this->userTable);
        return $this->db->affected_rows();
    }

    /**
     * Changes the user's password
     *
     * @param $userID int the user's ID
     * @param $newPassword string the new password (unhashed)
     * @return int the count of rows affected
     */
    public function changePassword($userID, $newPassword){
        $passHash = $this->generatePasswordHash($newPassword);

        $this->db->where('ID', $userID)->update($this->userTable, array('PasswordHash' => $passHash));
        return $this->db->affected_rows();
    }
}
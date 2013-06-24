<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class Account extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/', 'refresh');
    }

    public function settings(){
        if($this->checkLogin()){
            $userdata = $this->session->userdata('user');
            $data['apikey'] = $this->usermodel->getAPIKey($userdata['ID']);
        }else{
            return;
        }

        $this->loadWebPage('account/settings', "Edit Profile - ExceptionBase.NET", 0, $data);
    }

    public function manage(){
        $data['userlist'] = $this->usermodel->getUserList();
        $this->loadWebPage('account/manage', "Manage Users - ExceptionBase.NET", 3, $data);
    }

    public function registerUser(){
        $username  = $_POST['newUserName'];
        $usermail  = $_POST['newUserMail'];
        $userlevel = $_POST['newUserLevel'];
        $password  = $_POST['newUserPassword'];

        if(!(isset($username) && isset($usermail) && isset($userlevel) && isset($password)) ||
            $username == "" || $usermail == "" || $password == "" || $userlevel < 0 ||
            ($this->userdata['UserLevel'] < 4 && $userlevel > 3) ||
            ($this->userdata['UserLevel'] == 4 && $userlevel > 4) ||
            !$this->checkLogin(false) || $this->userdata['UserLevel'] < 3)
        {
            redirect('/account/manage/#10');
            return;
        }

        $this->usermodel->addUser($username, $usermail, $userlevel, $password);
        redirect('/account/manage/#11');
    }

    public function editUser(){
        $userID  = $_POST['changeUserID'];
        $username  = $_POST['changeUserName'];
        $usermail  = $_POST['changeUserMail'];
        $userlevel = $_POST['changeUserLevel'];
        $password  = $_POST['changeUserPassword'];

        if(!(isset($username) && isset($usermail) && isset($userlevel) && isset($password)) ||
            $username == "" || $usermail == "" || $userlevel < 0 ||
            ($this->userdata['UserLevel'] < 4 && $userlevel > 3) ||
            ($this->userdata['UserLevel'] == 4 && $userlevel > 4) ||
            !$this->checkLogin(false) || $this->userdata['UserLevel'] < 3)
        {
            redirect('/account/manage/#30');
            return;
        }

        $this->usermodel->changeUserdata($userID, $username, $usermail);
        $this->usermodel->changeUserLevel($userID, $userlevel);

        if($password != "") $this->usermodel->changePassword($userID, $password);

        redirect('/account/manage/#31');
    }

    public function deleteUser(){
        $urlarray = $this->uri->segment_array();
        $curruser = $this->userdata;
        $userID = $urlarray[3];
        $user = $this->usermodel->getSingleUser($userID);

        if(!isset($userID) || $userID < 0 || $curruser['UserLevel'] < 3 ||
            $curruser['UserLevel'] < $user[0]['UserLevel'])
        {
            redirect('/account/manage/#20');
            return;
        }

        $this->usermodel->deleteUser($userID);
        redirect('/account/manage/#21');
    }
}
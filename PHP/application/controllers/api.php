<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class API extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function changeStatus()
    {
        if(isset($_POST['field']) && isset($_POST['filter']) && isset($_POST['newStatus'])){
            $userData = $this->session->userdata('user');

            if ($_POST['field'] != "" && $_POST['filter'] != "" && $_POST['newStatus'] != "" &&
                $_POST['newStatus'] >= 0 && $_POST['newStatus'] <= 2 &&
                $this->checkLogin(false) && $userData['UserLevel'] >= 1
            ) {
                $this->exceptionmodel->alterExceptions(
                    array($_POST['field'] => $_POST['filter']),
                    array('Fixed' => $_POST['newStatus'])
                );
                echo '1';
            } else {
                echo '0';
            }
        }
    }

    public function deleteException($id = -1){
        if($id == -1 || !$this->checkLogin()){
            redirect('/');
            return;
        }

        $exception = $this->exceptionmodel->getSingleException($id);
        $appID = $exception[0]['App'];

        $this->exceptionmodel->deleteExceptions(array('ID' => $id));

        redirect('/applications/' . $appID);
    }

    public function publishException($id = -1){
        $this->changeExceptionPerma($id, 1);
    }

    public function unpublishException($id = -1){
        $this->changeExceptionPerma($id, 0);
    }

    private function changeExceptionPerma($id = -1, $published = 0){
        if($id == -1 || !$this->checkLogin()){
            redirect('/');
            return;
        }

        $this->exceptionmodel->alterExceptions(array('ID' => $id), array('Public' => $published));

        redirect('/exceptions/' . $id);
    }

    /**
     * @param string $param
     * @param string $default
     *
     * @return string the result
     */
    private function checkPostData($param, $default = ""){
        if(isset($_POST[$param])){
            return $_POST[$param];
        }else{
            return $default;
        }
    }

    public function addException(){
        $em = ($this->checkPostData("em")); // ExceptionMessage
        $ei = ($this->checkPostData("ei")); // ExceptionInner (Message)
        $st = ($this->checkPostData("st")); // StackTrace
        $eme = ($this->checkPostData("eme")); // ErrorMethod
        $udesc = ($this->checkPostData("udesc")); // UserDescription
        $appid = ($this->checkPostData("appid")); // AppID
        $v = ($this->checkPostData("v")); // Version
        $net = ($this->checkPostData("net")); // NETFramework
        $os = ($this->checkPostData("os")); // InstalledOS
        $arch = ($this->checkPostData("arch")); // Architecture
        $cores = ($this->checkPostData("cores")); // NumCores
        $memfree = ($this->checkPostData("memfree")); // MemoryFree
        $memtotal = ($this->checkPostData("memtotal")); // MemoryTotal
        $misc = ($this->checkPostData("misc")); // Misc data
        $misctype = ($this->checkPostData("misctype")); // Misc data type

        if($appid == "" || !isset($appid)){
            echo "0;AppID not set";
            return;
        }

        if(count($this->applicationmodel->getSingleApplication($appid)) == 0){
            echo "0;App isn't registered";
            return;
        }

        try{
            $this->exceptionmodel->addSingleException($appid, $v, $em, $ei, $st,
                $eme, $udesc, $net, $os, $arch, $cores, $memfree, $memtotal, base64_decode($misc), $misctype);

            echo "1";
        }catch(Exception $ex){
            echo "0;" . $ex->getMessage();
        }
    }

    public function changeUserdata()
    {
        if(isset($_POST['newUsername']) && isset($_POST['newMail'])){
            if($_POST['newUsername'] == ""){
                echo "user";
                return;
            }

            if($_POST['newMail'] == ""){
                echo "mail";
                return;
            }

            if(!$this->checkLogin(false)){
                echo "not logged in";
                return;
            }

            $userdata = $this->session->userdata('user');
            $this->usermodel->changeUserdata($userdata['ID'], $_POST['newUsername'], $_POST['newMail']);

            echo "success";
        }else{
            echo 'missing fields';
        }
    }

    public function changePassword(){
        if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['rePassword'])){
            $userdata = $this->session->userdata('user');

            if($_POST['oldPassword'] == "" || !$this->usermodel->tryLoginByID($userdata['ID'], $_POST['oldPassword'])){
                echo "old";
                return;
            }

            if($_POST['newPassword'] == ""){
                echo "new";
                return;
            }

            if($_POST['rePassword'] == "" || $_POST['rePassword'] != $_POST['newPassword']){
                echo "re";
                return;
            }

            if(!$this->checkLogin(false)){
                echo "not logged in";
                return;
            }

            $this->usermodel->changePassword($userdata['ID'], $_POST['newPassword']);

            echo "success";
        }else{
            echo "missing fields";
        }
    }
}
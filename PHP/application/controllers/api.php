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

    public function addException(){
        $em = ($_POST["em"]); // ExceptionMessage
        $ei = ($_POST["ei"]); // ExceptionInner (Message)
        $st = ($_POST["st"]); // StackTrace
        $eme = ($_POST["eme"]); // ErrorMethod
        $udesc = ($_POST["udesc"]); // UserDescription
        $appid = ($_POST["appid"]); // AppID
        $v = ($_POST["v"]); // Version
        $net = ($_POST["net"]); // NETFramework
        $os = ($_POST["os"]); // InstalledOS
        $arch = ($_POST["arch"]); // Architecture
        $cores = ($_POST["cores"]); // NumCores
        $memfree = ($_POST["memfree"]); // MemoryFree
        $memtotal = ($_POST["memtotal"]); // MemoryTotal
        $misc = ($_POST["misc"]); // Misc data
        $misctype = ($_POST["misctype"]); // Misc data type

        if($appid == "" || !isset($appid)){
            print_r($_POST);
            return;
        }

        if(count($this->applicationmodel->getSingleApplication($appid)) == 0){
            echo "0;App isn't registered";
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
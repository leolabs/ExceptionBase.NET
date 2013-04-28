<?php
/**
 * Created by Leo Bernard. More at leolabs.org
 */

class Install extends CI_Controller {
    public function index(){
        $data['step'] = 1;
        $data['maxstep'] = 2;

        if(file_exists('application/config/database.php')){
            $this->load->database();
            if($this->db->table_exists('applications') &&
                $this->db->table_exists('exceptions') && $this->db->table_exists('users')
            ){
                $data['step'] = 2;

                if($this->db->count_all_results('exceptions') > 0){
                    redirect('/');
                    return;
                }
            }
        }

        $this->load->view('system/install', $data);
    }

    public function installCheckDBConnection(){
        $dbhost = $_POST['host'];
        $dbname = $_POST['name'];
        $dbuser = $_POST['user'];
        $dbpass = $_POST['pass'];

        $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);

        if($conn == false){
            echo "0";
        }else{
            echo "1";
        }
    }

    public function createTables()
    {
        $this->load->database();

        $apps = $this->db->query("CREATE TABLE IF NOT EXISTS `applications` (
                                  `ID` int(11) NOT NULL AUTO_INCREMENT,
                                  `Name` varchar(100) NOT NULL,
                                  PRIMARY KEY (`ID`)
                                ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

        $exceptions = $this->db->query("CREATE TABLE IF NOT EXISTS `exceptions` (
                                  `ID` int(10) NOT NULL AUTO_INCREMENT,
                                  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                  `Fixed` tinyint(1) NOT NULL DEFAULT '0',
                                  `Public` tinyint(1) NOT NULL DEFAULT '0',
                                  `ExceptionMessage` text NOT NULL,
                                  `ExceptionInner` text,
                                  `StackTrace` text NOT NULL,
                                  `ErrorMethod` text NOT NULL,
                                  `UserDescription` text,
                                  `App` int(2) NOT NULL,
                                  `Version` varchar(50) NOT NULL,
                                  `NETFramework` varchar(25) NOT NULL,
                                  `InstalledOS` varchar(100) NOT NULL,
                                  `Architecture` varchar(4) NOT NULL DEFAULT 'N/A',
                                  `NumCores` int(2) NOT NULL DEFAULT '-1',
                                  `MemoryFree` int(11) NOT NULL DEFAULT '-1',
                                  `MemoryTotal` int(11) NOT NULL DEFAULT '-1',
                                  `MiscData` blob,
                                  PRIMARY KEY (`ID`)
                                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;");

        $users = $this->db->query("CREATE TABLE IF NOT EXISTS `users` (
                                  `ID` int(2) NOT NULL AUTO_INCREMENT,
                                  `Username` varchar(50) NOT NULL,
                                  `UserLevel` int(1) NOT NULL DEFAULT '0',
                                  `PasswordHash` varchar(256) NOT NULL,
                                  `Mail` varchar(200) NOT NULL,
                                  PRIMARY KEY (`ID`),
                                  KEY `ID` (`ID`)
                                ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

        if($apps && $users && $exceptions){
            redirect('/install/');
        }else{
            redirect('/install/#40');
        }
    }

    public function installSetupConfig()
    {
        if(!file_exists('application/config/database.php')){
            $dbhost = $_POST['host'];
            $dbname = $_POST['name'];
            $dbuser = $_POST['user'];
            $dbpass = $_POST['pass'];

            if(!isset($dbhost) || !isset($dbname) || !isset($dbuser) || !isset($dbpass) ||
                $dbhost == "" || $dbname == "" || $dbuser == "" || $dbpass == "")
            {
                print_r($_POST);
                return;
            }

            if(mysql_connect($dbhost, $dbuser, $dbpass, $dbname) == false){
                redirect('/install/#20');
                return;
            }

            $configFile = '<?
        $active_group = \'default\';
        $active_record = TRUE;
        $db[\'default\'][\'hostname\'] = \'' . $dbhost . '\';
        $db[\'default\'][\'username\'] = \'' . $dbuser . '\';
        $db[\'default\'][\'password\'] = \'' . $dbpass . '\';
        $db[\'default\'][\'database\'] = \'' . $dbname . '\';
        $db[\'default\'][\'dbdriver\'] = \'mysql\';
        $db[\'default\'][\'dbprefix\'] = \'\';
        $db[\'default\'][\'pconnect\'] = TRUE;
        $db[\'default\'][\'db_debug\'] = TRUE;
        $db[\'default\'][\'cache_on\'] = FALSE;
        $db[\'default\'][\'cachedir\'] = \'\';
        $db[\'default\'][\'char_set\'] = \'utf8\';
        $db[\'default\'][\'dbcollat\'] = \'utf8_general_ci\';
        $db[\'default\'][\'swap_pre\'] = \'\';
        $db[\'default\'][\'autoinit\'] = TRUE;
        $db[\'default\'][\'stricton\'] = FALSE;';

            $ans = file_put_contents('application/config/database.php', $configFile);

            if($ans !== false){
                redirect('/install/createTables');
            }else{
                redirect('/install/#30');
            }
        }
    }

    public function createFirstUser()
    {
        $this->load->database();
        $this->load->model("usermodel");

        $user = $_POST["user"];
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];
        $repass = $_POST["repass"];

        if(!isset($user) || !isset($mail) || !isset($pass) || !isset($repass) ||
            $user == "" || $mail == "" || $pass == "" || $repass == "" || $pass != $repass
        ){
            echo "2";
            return;
        }

        try{
            $this->usermodel->addUser($user, $mail, 4, $pass);
            echo "1";
        }catch(Exception $ex){
            echo "0";
        }
    }
}
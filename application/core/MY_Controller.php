<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 *
 * @var ApplicationModel applicationmodel
 * @var ExceptionModel exceptionmodel
 * @var UserModel usermodel
 */

/**
 * Class Base_Controller
 *
 */

class Base_Controller extends CI_Controller
{

    /** @var array the Session data for the logged in user */
    public $userdata;

    function __construct()
    {
        parent::__construct();
        
        if(!file_exists('application/config/database.php')){
            redirect('/install/');
            return;
        }

        $this->load->database();

        if(!$this->db->table_exists('applications') ||
                !$this->db->table_exists('exceptions') || !$this->db->table_exists('users') ||
                count($this->db->get('users')->result_array()) == 0
        ){
            redirect('/install/');
            return;
        }

        $this->load->model('applicationmodel');
        $this->load->model('exceptionmodel');
        $this->load->model('usermodel');
        $this->userdata = $this->session->userdata('user');
    }

    protected function getExpandedAppList()
    {
        $applist = $this->applicationmodel->getApplicationList();
        $newAppList = array();

        foreach ($applist as $row) {
            $tmpRow = $row;
            $tmpRow['ErrorCount'] = $this->exceptionmodel->getFilteredExceptionCount(array('App' => $row['ID'], 'Fixed' => 0));
            $tmpRow['MarkedCount'] = $this->exceptionmodel->getFilteredExceptionCount(array('App' => $row['ID'], 'Fixed' => 2));
            $tmpRow['FixedCount'] = $this->exceptionmodel->getFilteredExceptionCount(array('App' => $row['ID'], 'Fixed' => 1));
            $newAppList[$tmpRow['ID']] = $tmpRow;
        }

        return $newAppList;
    }

    /**
     * Displays a page and loads the static header, menu and footer templates
     *
     * @param string $view the view that should be displayed
     * @param string $title the title of the page
     * @param int $userLevel the user level required to view this page
     * @param array $customData the data that should be passed to the view
     */
    protected function loadWebPage($view, $title, $userLevel = 0, $customData = array())
    {

        if($this->checkLogin()){
            $data['user'] = $this->session->userdata('user');
            $data['title'] = $title;
            $data['applist'] = $this->getExpandedAppList();
            $data['custom'] = $customData;

            if($data['user']['UserLevel'] >= $userLevel){
                $this->load->view('static/header', $data);
                $this->load->view('static/menu', $data);
                $this->load->view($view, $data);
                $this->load->view('static/footer', $data);
            }else{
                $this->load->view('nopermission', $data);
            }
        }
    }

    /**
     * Displays a page and loads the static header, menu and footer templates
     *
     * @param array $view the view that should be displayed
     * @param string $title the title of the page
     * @param int $userLevel the required level to view this page
     * @param array $customData the data that should be passed to the view
     */
    protected function loadWebPageArray($view, $title, $userLevel, $customData = array())
    {

        if($this->checkLogin()){
            $data['user'] = $this->session->userdata('user');
            $data['title'] = $title;
            $data['applist'] = $this->getExpandedAppList();
            $data['custom'] = $customData;
            if($data['user']['UserLevel'] >= $userLevel){
                $this->load->view('static/header', $data);
                $this->load->view('static/menu', $data);
                foreach ($view as $single) {
                    $this->load->view($single, $data);
                }
                $this->load->view('static/footer', $data);
            }else{
                $this->load->view('nopermission', $data);
            }
        }
    }


    protected function checkLogin($redirect = true)
    {
        if ($this->session->userdata('user')) {
            return true;
        } else {
            //If no session, redirect to login page
            if($redirect) redirect('login', 'refresh');
            return false;
        }
    }
}
<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class Applications extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function _remap($method)
    {
        if (method_exists($this, $method)) {
            $this->$method();
        } elseif(is_numeric($method) ) {
            $this->index($method);
        } else{
            $this->loadWebPage('notfound', 'Application not found - ExceptionBase.NET');
        }
    }

    public function index($appID = -1)
    {
        if ($appID == -1) {
            $this->loadWebPage('applications/index', 'Applications - ExceptionBase.NET', 0);
        } else {
            if(count($this->applicationmodel->getSingleApplication($appID)) > 0){
                $customData['appinfo'] = $this->applicationmodel->getSingleApplication($appID);

                if ($this->uri->segment(3) == FALSE || $this->uri->segment(3) != 'grouped') {
                    $filter = $this->uri->uri_to_assoc(3);
                    $filter['App'] = $appID;
                    $filter['Fixed'] = (isset($filter['Fixed'])) ? $filter['Fixed'] : 0;


                    $customData['exceptions'] = $this->exceptionmodel->getFilteredExceptionList($filter);
                    $customData['fixedField'] = $filter['Fixed'];
                    $this->loadWebPageArray(array('applications/header', 'applications/ungrouped'), $customData['appinfo'][0]['Name'] . ' - ExceptionBase.NET', 0, $customData);
                } elseif ($this->uri->segment(3) == 'grouped') {
                    $filter = $this->uri->uri_to_assoc(5);
                    $filter['App'] = $appID;
                    $filter['Fixed'] = (isset($filter['Fixed'])) ? $filter['Fixed'] : 0;

                    $customData['groupField'] = $this->uri->segment(4);
                    $customData['fixedField'] = $filter['Fixed'];
                    $customData['exceptions'] = $this->exceptionmodel->getGroupedExceptionList($this->uri->segment(4), $filter);
                    $this->loadWebPageArray(array('applications/header', 'applications/grouped'), $customData['appinfo'][0]['Name'] . ' - ExceptionBase.NET', 0, $customData);
                }
            }else{
                $this->loadWebPage('notfound', '404 - Page not found! - ExceptionBase.NET', 0);
            }
        }
    }

    public function manage()
    {
        $this->loadWebPage('applications/manage', "Manage Applications - ExceptionBase.NET", 2);
    }

    public function deleteApp(){
        $urlarray = $this->uri->segment_array();

        if(count($urlarray) != 3 || !$this->checkLogin(false) || $this->userdata['UserLevel'] < 2){
            redirect('/applications/manage/#10');
            return;
        }

        $this->applicationmodel->deleteApplication($urlarray[3]);
        $this->exceptionmodel->deleteExceptions(array('App' => $urlarray[3]));

        redirect('/applications/manage/#11');
    }

    public function registerApp(){
        $urlarray = $this->uri->segment_array();

        if(count($urlarray) != 3 || !$this->checkLogin(false) || $this->userdata['UserLevel'] < 2){
            redirect('/applications/manage/#30');
            return;
        }

        $this->applicationmodel->addApplication(urldecode($urlarray[3]));
        redirect('/applications/manage/#31');
    }

    public function changeApp(){
        $urlarray = $this->uri->segment_array();

        if(count($urlarray) != 4 || !$this->checkLogin(false) || $this->userdata['UserLevel'] < 2){
            redirect('/applications/manage/#20');
            return;
        }

        $this->applicationmodel->alterApplication($urlarray[3], $urlarray[4]);
        redirect('/applications/manage/#21');
    }

    public function cleanApp(){
        $urlarray = $this->uri->segment_array();
        $fixed = -1;

        if(count($urlarray) != 4 || !$this->checkLogin(false) || $this->userdata['UserLevel'] < 2){
            redirect('/applications/manage/#40');
            return;
        }

        switch(strtolower($urlarray[4])){
            case "fixed":
                $fixed = 1;
                break;
            case "unfixed":
                $fixed = 0;
                break;
            case "marked":
                $fixed = 2;
                break;
            default:
                redirect('/applications/manage/#40');
                return;
        }

        $this->exceptionmodel->deleteExceptions(array('App' => $urlarray[3], 'Fixed' => $fixed));
        redirect('/applications/manage/#41');
    }
}
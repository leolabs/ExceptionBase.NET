<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class BaseController extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }


    /**
     * Displays a page and loads the static header, menu and footer templates
     *
     * @param string $view the view that should be displayed
     * @param string $title the title of the page
     * @param array $customData the data that should be passed to the view
     */
    protected function loadWebPage($view, $title, $customData)
    {
        $this->load->model('applicationmodel');

       // if($this->checkLogin()){
            $data['user'] = $this->session->userdata('user');
            $data['title'] = $title;
            $data['applist'] = $this->applicationmodel->getApplicationList();
            $data['custom'] = $customData;

            $this->load->view('static/header', $data);
            $this->load->view('static/menu', $data);
            $this->load->view($view, $data);
            $this->load->view('static/footer', $data);
       // }
    }


    protected function checkLogin()
    {
        if ($this->session->userdata('user')) {
            return true;
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
            return false;
        }

    }
}
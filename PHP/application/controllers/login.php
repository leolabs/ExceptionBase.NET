<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class Login extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->checkLogin(false))
            redirect('/');

        $this->load->view('login');
    }

    public function check()
    {
        if(isset($_POST['user']) && isset($_POST['pass'])){
            $this->load->model('usermodel');

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $userCheck = $this->usermodel->tryLogin($user, $pass);

            if ($userCheck[0]) {
                $this->session->set_userdata('user', $userCheck[1][0]);

                $redirect = $this->session->userdata('redirect');
                echo $redirect;

                if($redirect){
                    redirect($redirect);
                }else{
                    redirect('/');
                }
            }else{
                $this->load->view('login', array('tryAgain' => true));
            }
        }else{
            echo "Please don't use this address directly. If you want to log in, just use the corresponding";
            echo ' <a href="' . site_url('/login/') . '">login form</a>.';
        }
    }
}
<?
/**
 * perma.php created by Leo Bernard. More at leolabs.org
 */

class Perma extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('/');
    }

    public function id($id = -1){
        if($id == -1){
            $data['subLine'] = "";
            $this->load->view('permalink/header', $data);
            $this->load->view('permalink/error');
            $this->load->view('permalink/footer');
            return;
        }

        $dbdata = $this->exceptionmodel->getSingleException($id);

        if ($dbdata[0]['Public'] != 1){
            $data['subLine'] = "";
            $this->load->view('permalink/header', $data);
            $this->load->view('permalink/error');
            $this->load->view('permalink/footer');
        }else{
            $data['permaException'] = $dbdata[0];
            $data['subLine'] = "#" . $dbdata[0]['ID'];
            $this->load->view('permalink/header', $data);
            $this->load->view('permalink/single', $data);
            $this->load->view('permalink/footer');
        }
    }
}
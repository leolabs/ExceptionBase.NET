<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class Content extends Base_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function image($id = -1){
        if($id == -1 || !$this->checkLogin()){
            redirect('/');
            return;
        }

        $exception = $this->exceptionmodel->getSingleException($id);

        if(count($exception) == 0){
            redirect('/');
            return;
        }

        $f = finfo_open();
        $mime_type = finfo_buffer($f, $exception[0]['MiscData'], FILEINFO_MIME_TYPE);

        header("Content-type:" . $mime_type);
        echo $exception[0]['MiscData'];
    }

    public function binary($id = -1){
        if($id == -1 || !$this->checkLogin()){
            redirect('/');
            return;
        }

        $exception = $this->exceptionmodel->getSingleException($id);

        if(count($exception) == 0){
            redirect('/');
            return;
        }

        $f = finfo_open();
        $mime_type = finfo_buffer($f, $exception[0]['MiscData'], FILEINFO_MIME_TYPE);

        header("Content-type:" . $mime_type);
        header("Content-Disposition: attachment; filename=\"ExceptionBinary-" . $exception[0]['ID'] . "\"");
        echo $exception[0]['MiscData'];
    }
}

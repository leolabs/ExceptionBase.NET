<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class Home extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $customData['errorCount'] = $this->exceptionmodel->getExceptionCount();
        $this->loadWebPage('home', 'Home - ExceptionBase.NET', 0, $customData);
    }
}
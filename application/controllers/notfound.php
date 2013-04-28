<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class NotFound extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadWebPage('notfound', '404 - Page not found! - ExceptionBase.NET', 0);
    }
}
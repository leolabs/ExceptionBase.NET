<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class Exceptions extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function _remap($method)
    {
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->index($method);
        }
    }

    public function index($exID = -1)
    {
        if ($exID == -1) {
            $this->loadWebPage('exceptions/index', 'Applications - ExceptionBase.NET', 0);
        } else {
            $customData['exception'] = $this->exceptionmodel->getSingleException($exID);
            $customData['headLine'] = "Exception " . $exID;
            $customData['groupField'] = "ID";
            $customData['multi'] = false;
            $this->loadWebPageArray(array('exceptions/header', 'exceptions/single'),
                $customData['headLine'] . ' - ExceptionBase.NET', 0, $customData);
        }
    }

    public function by(){
        $urlArray = $this->uri->segment_array();

        $groupField = urldecode($urlArray[3]);
        $groupFilter = html_entity_decode(urldecode($urlArray[4]));

        if(count($urlArray) == 4){
            $data = $this->exceptionmodel->getFilteredExceptionList(array($groupField => $groupFilter));
        }elseif(count($urlArray) == 6){
            $fixedFilter = urldecode($urlArray[6]);
            $data = $this->exceptionmodel->getFilteredExceptionList(array($groupField => $groupFilter, 'Fixed' => $fixedFilter));
        }

        $sortData = array();
        $fields = array('ID', 'Date', 'ExceptionMessage', 'ExceptionInner', 'StackTrace',
            'ErrorMethod', 'UserDescription', 'Version', 'NETFramework', 'InstalledOS',
            'Architecture', 'NumCores', 'MemoryFree', 'MemoryTotal', 'MiscData', 'Fixed');

        foreach ($fields as $field) {
            $sortData[$field] = array();
        }


        foreach ($data as $row) {
            foreach ($fields as $field) {
                if(!in_array($row[$field], $sortData[$field]) && $row[$field] != ""){
                    array_push($sortData[$field], $row[$field]);
                }
            }
        }

        $customData['exception'] = $sortData;
        $customData['headLine'] = "Exceptions <small>by <abbr title=\"" . $groupFilter . "\">" . $groupField . "</abbr></small>";
        $customData['multi'] = true;
        $customData['groupField'] = $groupField;
        $customData['subLine'] = $urlArray[4];
        $this->loadWebPageArray(array('exceptions/header', 'exceptions/multi'),
            "Exceptions by " . $groupField . ' - ExceptionBase.NET', 0, $customData);

    }
}
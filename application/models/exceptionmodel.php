<?php
/**
 * Created by Leo Bernard, more information at leolabs.org
 */

class ExceptionModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns a List of all exceptions in the database
     */
    public function getExceptionList()
    {
        return $this->db->get('exceptions')->result_array();
    }

    /**
     * Returns the count of all exceptions in the database
     */
    public function getExceptionCount()
    {
        return $this->db->get_where('exceptions', array('Fixed' => 0))->num_rows();
    }

    private function sorter($oa, $ob)
    {
        $a = $oa[1];
        $b = $ob[1];

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? +1 : -1;
    }

    /**
     * @param string $field the field name that the results should be sorted for
     * @param array $filter the filter that should be applied before grouping the results
     *
     * @return array the grouped results
     */
    public function getGroupedExceptionList($field, $filter = array())
    {
        $result = $this->db->get_where('exceptions', $filter)->result_array();
        $sorted = array();
        $count = array();

        foreach ($result as $row) {
            if (!in_array($row[$field], $sorted) && $row[$field] != "") {
                array_push($sorted, $row[$field]);
            }

            array_push($count, $row[$field]);
        }

        $counter = array_count_values($count);
        $return = array();

        foreach ($sorted as $row) {
            array_push($return, array($row, $counter[$row]));
        }

        usort($return, array($this, "sorter"));

        return $return;
    }

    /**
     * Returns a search result of a query
     *
     * @param string $searchTerm the specified search term
     * @param string $field the fields that should be searched, all searches every field
     * @param array $filter the filter that should be applied to the result
     * @return array the result
     */
    public function getSearchResultList($searchTerm, $field = 'all', $filter = array())
    {
        $this->db->select("*")->from('exceptions');
        $this->db->where($filter);

        if ($field == 'All Fields' || $field == 'all') {
            $this->db->like('ID', $searchTerm);
            $this->db->or_like('Date', $searchTerm);
            $this->db->or_like('ExceptionMessage', $searchTerm);
            $this->db->or_like('ExceptionInner', $searchTerm);
            $this->db->or_like('StackTrace', $searchTerm);
            $this->db->or_like('ErrorMethod', $searchTerm);
            $this->db->or_like('UserDescription', $searchTerm);
            $this->db->or_like('Version', $searchTerm);
            $this->db->or_like('NETFramework', $searchTerm);
            $this->db->or_like('InstalledOS', $searchTerm);
            $this->db->or_like('Architecture', $searchTerm);
            $this->db->or_like('NumCores', $searchTerm);
            $this->db->or_like('MemoryFree', $searchTerm);
            $this->db->or_like('MemoryTotal', $searchTerm);
        } else {
            $this->db->like($field, $searchTerm);
        }

        return $this->db->get()->result_array();
    }

    /**
     * Gets a single exception by it's ID
     *
     * @param int $id the exception's ID
     * @return array the result
     */
    public function getSingleException($id)
    {
        return $this->db->get_where('exceptions', array('ID' => $id))->result_array();
    }

    /**
     * Returns a list of exceptions filtered and sorted by given arguments
     *
     * @param array $filter the filter that should be applied to the result
     * @param string $orderKey the field that the result should be sorted after
     * @param string $orderDir the direction this field should be sorted after (asc, desc, random)
     * @return array the result of the request
     */
    public function getFilteredExceptionList($filter, $orderKey = 'Date', $orderDir = 'desc')
    {
        $this->db->select('*')->from('exceptions');
        $this->db->where($filter)->order_by($orderKey, $orderDir);
        return $this->db->get()->result_array();
    }

    /**
     * Returns a list of exceptions filtered and sorted by given arguments
     *
     * @param array $filter the filter that should be applied to the result
     * @return array the result of the request
     */
    public function getFilteredExceptionCount($filter)
    {
        return $this->db->get_where('exceptions', $filter)->num_rows();
    }

    /**
     * Inserts a new exception into the database
     *
     * @param int $appID
     * @param string $appVersion
     * @param string $exceptionMessage
     * @param string $exceptionInner
     * @param string $stackTrace
     * @param string $errorMethod
     * @param string $userDescription
     * @param string $netFramework
     * @param string $installedOS
     * @param string $architecture
     * @param int $numCores
     * @param int $memoryFree
     * @param int $memoryTotal
     * @param string $miscData
     * @return object the inserting result
     */
    public function addSingleException($appID, $appVersion, $exceptionMessage, $exceptionInner, $stackTrace,
                                       $errorMethod, $userDescription, $netFramework, $installedOS, $architecture,
                                       $numCores, $memoryFree, $memoryTotal, $miscData)
    {
        $insertData = array(
            'ExceptionMessage' => $exceptionMessage,
            'ExceptionInner' => $exceptionInner,
            'StackTrace' => $stackTrace,
            'ErrorMethod' => $errorMethod,
            'UserDescription' => $userDescription,
            'App' => $appID,
            'Version' => $appVersion,
            'NETFramework' => $netFramework,
            'InstalledOS' => $installedOS,
            'Architecture' => $architecture,
            'NumCores' => $numCores,
            'MemoryFree' => $memoryFree,
            'MemoryTotal' => $memoryTotal,
            'MiscData' => $miscData
        );

        return $this->db->insert('exceptions', $insertData)->insert_id();
    }

    /**
     * Alters one or more exceptions in the database
     *
     * @param array $filter the filter that gets applied to the items before altering them
     * @param array $fields the fields that should be altered
     * @return array the result
     */
    public function alterExceptions($filter, $fields)
    {
        $this->db->where($filter)->update('exceptions', $fields);
        return $this->db->affected_rows();
    }

    /**
     * Deletes one or more exceptions in the database
     *
     * @param array $filter the filter that gets applied to the items before deleting them
     * @return array the result
     */
    public function deleteExceptions($filter)
    {
        $this->db->where($filter)->delete('exceptions');
        return $this->db->affected_rows();
    }
}
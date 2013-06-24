<?php
/**
 * This file provides the ApplicationModel
 *
 * Created by Leo Bernard, more information at leolabs.org
 */

/**
 * The ApplicationModel provides access to applications in the database.
 */
class ApplicationModel extends CI_Model
{
    var $applicationTable = 'applications';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Gets information about a single application
     *
     * @param string $id the application's ID
     * @return array the application's information
     */
    public function getSingleApplication($id)
    {
        return $this->db->get_where($this->applicationTable, array('ID' => $id))->result_array();
    }

    /**
     * Returns a list of all the applications in the database
     *
     * @return array the list of applications
     */
    public function getApplicationList()
    {
        return $this->db->get($this->applicationTable)->result_array();
    }

    /**
     * Alters one or more applications in the database
     *
     * @param int $id the ID of the application that should be altered
     * @param string $name the fields that should be altered
     * @return array the result
     */
    public function alterApplication($id, $name)
    {
        $this->db->where('ID', $id)->update($this->applicationTable, array('Name' => $name));
        return $this->db->affected_rows();
    }

    /**
     * Deletes an application in the database
     *
     * @param array $id the ID of the application that should be deleted
     * @return array the result
     */
    public function deleteApplication($id)
    {
        $this->db->where('ID', $id)->delete($this->applicationTable);
        return $this->db->affected_rows();
    }

    /**
     * Adds an application to the database
     *
     * @param string $name the new application's name
     *
     * @return int the application's ID in the database
     */
    public function addApplication($name)
    {
        return $this->db->insert($this->applicationTable, array('Name' => $name));
    }
}
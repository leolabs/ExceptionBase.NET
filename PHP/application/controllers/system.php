<?php
/**
 * Created by Leo Bernard. More at leolabs.org
 */

class System extends Base_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns the size of the database.
     *
     * @see http://ellislab.com/forums/viewthread/180668/#855200 thanks to the awesome guys at the codeigniter forums
     *
     * @return mixed
     */
    private function getDbSize() {
        $CI=&get_instance();
        $CI->load->database();

        $dbName = $CI->db->database;

        $dbName = $this->db->escape($dbName);

        $sql = "SELECT table_schema AS db_name, sum( data_length + index_length ) / 1024 / 1024 AS db_size_mb
                FROM information_schema.TABLES
                WHERE table_schema = $dbName
                GROUP BY table_schema ;";

        $query = $CI->db->query($sql);

        if ($query->num_rows() == 1) {
            $row = $query->row();
            $size = $row->db_size_mb;
            return round($size, 2) . ' MB';
        } else {
            return "N/A";
        }
    }

    public function settings(){
        $data['dbSize'] = $this->getDbSize();
        $this->loadWebPage('system/settings', "ExceptionBase.NET - System settings", 4, $data);
    }
}
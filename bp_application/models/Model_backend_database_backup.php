<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend application model
 */
class Model_backend_database_backup extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_db_tables()
	{
		return $this->db->list_tables();
	}
}

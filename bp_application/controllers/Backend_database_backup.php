<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend Applicant Contorller
 */
class Backend_database_backup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_backend_database_backup');
        $this->load->helper('download');
        $this->load->helper('file');
    }

    /**
     * Show Applicant List
     */
    public function index() {

        $param = array();
        $param['table_list'] = $this->model_backend_database_backup->get_db_tables();
        $param['content'] = $this->load->view('admin/backup/backup', $param, TRUE);
        $this->load->view('admin/index', $param);
    }

    function backup_table() {
        
        $backup_type= $this->input->post('backup_type');
        
        if($backup_type==1)
        {
            $table = $this->input->post('table_name');
            if(!empty($table))
            {
                $this->load->dbutil();
                $prefs = array(
                    'tables' => array($table), // Array of tables to backup.
                    'ignore' => array(), // List of tables to omit from the backup
                    'format' => 'sql', // gzip, zip, txt
                    'filename' => $table, // File name - NEEDED ONLY WITH ZIP FILES
                    'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
                    'add_insert' => TRUE, // Whether to add INSERT data to backup file
                    'newline' => "\n"             // Newline character used in backup file
                );
                $backup = $this->dbutil->backup($prefs);
               // Load the file helper and write the file to your server 
                write_file("/path/to/$table", $backup);
                // Load the download helper and send the file to your desktop       
                force_download($table . '.sql', $backup);
            }else{
                echo 'Plase select database';
                redirect(backend_database_backup);
            }
        }
        else{
               $prefs = array(
                    'format' => 'sql', // gzip, zip, txt
                );
            // Load the DB utility class
            $this->load->dbutil();
            // Backup your entire database and assign it to a variable
            $backup = $this->dbutil->backup($prefs);
            write_file('/path/to/7college.sql', $backup);
            force_download('7college.sql', $backup);        
        }
    }
}

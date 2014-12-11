<?php
class Temp_json_data_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function save_json_data($data){
        $query = "update temp_json_data set json_data='".$data."' where id=1";
        $this->db->query($query);
    }

    public function get_json_data(){
        $query  = $this->db->get_where('temp_json_data', array('id' => 1));
        $row    = $query->row_array();
        return $row;
    }
}
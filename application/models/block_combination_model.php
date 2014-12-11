<?php
class Block_combination_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_block_combination(){
        $query  = $this->db->get('block_combination');
        $row    = $query->result_array();
        
        return $row;
    }
}
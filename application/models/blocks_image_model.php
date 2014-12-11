<?php
class Blocks_image_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_block_images($Srno = NULL){
        $query  = $this->db->get('blocks_image');
        $row    = $query->result_array();
        
        return $row;
    }
}
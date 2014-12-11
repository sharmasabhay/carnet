<?php
class Blockspec_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_block_specs($Srno = NULL){
        if(!empty($Srno)){
            $query  = $this->db->get_where('block_spec', array('Srno' => $Srno));
            $row    = $query->row_array();
        }else{
            $query  = $this->db->get('block_spec');
            $row    = $query->result_array();
        }
        return $row;
    }
}
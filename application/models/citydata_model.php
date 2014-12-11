<?php
class Citydata_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function fieldsList(){
    	$fields = $this->db->list_fields('citydata');
    	$fieldsArr = array('' => '--Select Data Point--');
    	foreach ($fields as $key => $value) {
    		$fieldsArr[$value] = $value;
    	}
    	return $fieldsArr;
    }
}
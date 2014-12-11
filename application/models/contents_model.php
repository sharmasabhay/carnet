<?php
class Contents_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function fieldsList(){
    	$fields = $this->db->list_fields('contents');
    	return $fields;
    }

    public function get_assign_css($field){
    	$fieldName = 'events';
    	if($field==2)
    		$fieldName = 'article';
    	else if($field==3)
    		$fieldName = 'review';

    	$query  = $this->db->get('contents');
        $allRows= $query->result_array();
        $rows = array();
        if(!empty($allRows)){
        	$rows[0] = '--Select CSS--';
        	foreach ($allRows as $key => $rowArr) {
        		$rows[$rowArr['id']] = $rowArr[$fieldName];
        	}
        }
        return $rows;
    }
}
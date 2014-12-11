<?php
class Pages extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }

    public function index(){		     
		if ( ! file_exists(APPPATH.'/views/pages/index.php')){
			show_404();
		}
		$data['title'] = 'Dashboard'; 
		$data['errors'] = 0;

		$this->load->model('block_combination_model');
        $block_combination = $this->block_combination_model->get_block_combination();
        
        $blockComb = array();
	    if(!empty($block_combination)){
	        foreach ($block_combination as $bckey => $bcArr) {
	          $blockCombination = strtolower($bcArr['Block_Combination']);
	          $blockCombName = $bcArr['Block_Name'];
	          $blockCombArr = explode('+', $blockCombination);
	          $blockCombCSSArr = explode('+', $bcArr['Blocks_CSS']);
	          if(!empty($blockCombArr)){
	            foreach ($blockCombArr as $bcakey => $bcaName) {
	              $blockComb['css'][$blockCombName][] = $blockCombCSSArr[$bcakey];
	              $blockComb['type'][$blockCombName][] = $bcaName;
	            }                                
	          }
	        }
	    }
        $data['block_combination'] = $blockComb;

        $selectedBlockArr = array('blockids' => array());
        if(!empty($_POST)){
        	$selectedBlockArr['blockids'] = explode(',',$_POST['blockids']);
	        $this->session->set_userdata($selectedBlockArr);
        	redirect(site_url("step1"),"refresh");
        }

		$this->load->view('templates/header', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function create_layout_step_1(){		     
		if ( ! file_exists(APPPATH.'/views/pages/create_layout_step_1.php')){
			show_404();
		}
		$data['title'] = 'Create Layout Step 1'; 

		$this->load->model('blockspec_model');
        $data['block_spec'] = $this->blockspec_model->get_block_specs();

        $this->load->model('block_combination_model');
        $block_combination = $this->block_combination_model->get_block_combination();
        
        $blockComb = array();
	    if(!empty($block_combination)){
	        foreach ($block_combination as $bckey => $bcArr) {
	          $blockCombination = strtolower($bcArr['Block_Combination']);
	          $blockCombName = $bcArr['Block_Name'];
	          $blockCombArr = explode('+', $blockCombination);
	          $blockCombCSSArr = explode('+', $bcArr['Blocks_CSS']);
	          if(!empty($blockCombArr)){
	            foreach ($blockCombArr as $bcakey => $bcaName) {
	              $blockComb['css'][$blockCombName][] = $blockCombCSSArr[$bcakey];
	              $blockComb['type'][$blockCombName][] = $bcaName;
	            }                                
	          }
	        }
	    }
        $data['block_combination'] = $blockComb;

        $this->form_validation->set_rules('nameofyourlayer', 'Name of your layer', 'required');
        $this->form_validation->set_rules('content_type', 'Content type.', 'required');
        $data['errors'] = 0;
        $selectedBlockArr = array('nameofyourlayer' => '', 'content_type' => '');
        if(!empty($_POST)){
        	if ($this->form_validation->run() == TRUE){
        		$selectedBlockArr['blockids'] = explode(',',$_POST['blockids']);
	        	$selectedBlockArr['nameofyourlayer'] = $_POST['nameofyourlayer'];
	        	$selectedBlockArr['content_type'] = $_POST['content_type'];

	        	//save json data
	        	$this->save_json_data($selectedBlockArr);

	        	$this->session->set_userdata($selectedBlockArr);
	        	redirect(site_url("step2"),"refresh");
        	}else{
        		$data['errors'] = 1;
        	}
        }

        $blockComb = $this->getSessionBlocks($block_combination);
	    $data['session_data'] = $blockComb;
	    
		$this->load->view('templates/header', $data);
		$this->load->view('pages/create_layout_step_1', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function create_layout_step_2(){		     
		if ( ! file_exists(APPPATH.'/views/pages/create_layout_step_2.php')){
			show_404();
		}
		$data['title'] = 'Create Layout Step 2'; 
		$data['errors'] = 0;

		$sessionData = $this->session->all_userdata();

		$this->load->model('block_combination_model');
        $block_combination = $this->block_combination_model->get_block_combination($sessionData);
        
        $blockComb = $this->getSessionBlocks($block_combination);
	    $data['block_combination'] = $blockComb;
        
        $fieldsArr = $assign_css = array();
        if(!empty($sessionData)){
        	$content_type = $sessionData['content_type'];
        	if($content_type==1){
        		$this->load->model('calendar_model');
        		$fieldsArr = $this->calendar_model->fieldsList();
        	}else if($content_type==2){
        		$this->load->model('articles_model');
        		$fieldsArr = $this->articles_model->fieldsList();
        	}else if($content_type==3){
        		$this->load->model('citydata_model');
        		$fieldsArr = $this->citydata_model->fieldsList();
        	}

        	if(!empty($content_type)){
        		$this->load->model('contents_model');
        		$assign_css = $this->contents_model->get_assign_css($content_type);
        	}
        }        
        $data['assign_data'] = array('fields' => $fieldsArr, 'css' => $assign_css);

        if(!empty($_POST)){
        	prd($_POST);
        	//save json data
	       	$this->save_json_data($selectedBlockArr);

        	redirect(site_url("step3"),"refresh");
        }       

        $this->load->view('templates/header', $data);
		$this->load->view('pages/create_layout_step_2', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function create_layout_step_3(){		     
		if ( ! file_exists(APPPATH.'/views/pages/create_layout_step_3.php')){
			show_404();
		}
		$data['title'] = 'Create Layout Step 3'; 
		$data['errors'] = 0;

		if(!empty($_POST)){
        	redirect(site_url("step4"),"refresh");
        }

        $sessionData = $this->session->all_userdata();

		$this->load->model('block_combination_model');
        $block_combination = $this->block_combination_model->get_block_combination($sessionData);
        
        $blockComb = $this->getSessionBlocks($block_combination);
	    $data['block_combination'] = $blockComb;
	    
		$this->load->view('templates/header', $data);
		$this->load->view('pages/create_layout_step_3', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function create_layout_step_4(){		     
		if ( ! file_exists(APPPATH.'/views/pages/create_layout_step_4.php')){
			show_404();
		}
		$data['title'] = 'Create Layout Step 4'; 
		$data['errors'] = 0;

		if(!empty($_POST)){
        	redirect(site_url("step5"),"refresh");
        }

		$this->load->view('templates/header', $data);
		$this->load->view('pages/create_layout_step_4', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function create_layout_step_5(){		     
		if ( ! file_exists(APPPATH.'/views/pages/create_layout_step_5.php')){
			show_404();
		}
		$data['title'] = 'Create Layout Step 5'; 
		$data['errors'] = 0;

		if(!empty($_POST)){
        	redirect(site_url("step6"),"refresh");
        }

		$this->load->view('templates/header', $data);
		$this->load->view('pages/create_layout_step_5', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function create_layout_step_6(){		     
		if ( ! file_exists(APPPATH.'/views/pages/create_layout_step_6.php')){
			show_404();
		}
		$data['title'] = 'Create Layout Step 6'; 
		$data['errors'] = 0;

		if(!empty($_POST)){
        	redirect(site_url("index"),"refresh");
        }

		$this->load->view('templates/header', $data);
		$this->load->view('pages/create_layout_step_6', $data);
		$this->load->view('templates/footer', $data); 
	}

	public function getSessionBlocks($block_combination){
		$sessionData = $this->session->all_userdata();
		//pr($sessionData);
		$blockComb = array();
	    if(!empty($block_combination)){
	        foreach ($block_combination as $bckey => $bcArr) {
	          	$blockCombination = strtolower($bcArr['Block_Combination']);
	          	$blockCombName = $bcArr['Block_Name'];
	          	$blockCombArr = explode('+', $blockCombination);
	          	$blockCombCSSArr = explode('+', $bcArr['Blocks_CSS']);
	          
	          	$block_name1 = str_replace('+','',$blockCombName);
              	$block_name1 = str_replace('-','',$block_name1);
              	$block_name1 = strtolower($block_name1);
              	if(!empty($sessionData['blockids'])){	              	
		          	if(!empty($blockCombArr)){
		            	foreach ($blockCombArr as $bcakey => $bcaName) {
		            		//echo $block_name1."_".$bcaName.$bcakey."<br>";	            	
		            		if(in_array($block_name1."_".$bcaName.$bcakey,$sessionData['blockids'])){
		              			$blockComb['css'][$blockCombName][] = $blockCombCSSArr[$bcakey];
		              			$blockComb['type'][$blockCombName][] = $bcaName;
		          			}
		            	}                                
		          	}
	          	}
	        }
	    }

	    return $blockComb;
	}

	public function save_json_data($selectedBlockArr){
		$json_encode = json_encode($selectedBlockArr);
	    $this->load->model('temp_json_data_model');
	    $this->temp_json_data_model->save_json_data($json_encode);
	}

	public function get_json_data(){
		$this->load->model('temp_json_data_model');
	    $data = $this->temp_json_data_model->get_json_data();
	    $return = array();
	    if(!empty($data))
	    	$return = json_decode($data);

	    return $return;
	}
}
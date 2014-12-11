<div class="page-content-area">
	<div class="page-header">
    	<h1>Admin page-­Create a layer step 3a</h1>
    </div>
    <!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12"> 
        	 <!-- Show validation errors. -->
            <?php if(!empty($errors)){ ?>
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                <?php echo validation_errors(); ?>
              </div>
              <div class="hr hr32 hr-dotted"></div>
            <?php } ?>
            <!-- End validation errors. -->          	
          	<div class="row">
            	<div class="col-sm-12">
	              	<div class="widget-box">
	                	<div class="widget-header">
	                  		<h4 class="widget-title">Define Data Sources for the blocks in your layer(s) </h4>
	                	</div>
                    <div class="container-fluid">
                      <div>&nbsp;</div>
                      <?php echo form_open('',array('id' => 'create_layer_step3')); ?>
                        <input type="hidden" name='blockids' id='blockids' value="">
                        <div class="panel panel-default">
                          <?php
                          if(!empty($block_combination)){
                            ?>
                            <div class="panel-body">
                              <?php
                              foreach ($block_combination['css'] as $bckey => $bcArr) {
                                $block_name1 = str_replace('+','',$bckey);
                                $block_name1 = str_replace('-','',$block_name1);
                                $block_name1 = strtolower($block_name1);
                                ?>                              
                                <div id="<?php echo $block_name1; ?>">
                                  <?php
                                  if(!empty($bcArr)){
                                    foreach ($bcArr as $bcImgKey => $bcCSS) {
                                      $blockType = strtoupper($block_combination['type'][$bckey][$bcImgKey]);
                                      ?>
                                      <div class="row">
                                        <div class="<?php echo $bcCSS; ?>"><?php echo $blockType; ?></div>
                                        <div class="clear">&nbsp;</div>
                                        <div class="form-group">
                                          <label class="col-md-2"><b>Assign Tags</b></label>
                                          <?php
                                          echo form_input('tags[]', '','class="col-md-4"');
                                          ?>                                    
                                        </div> 
                                        <div class="clear">&nbsp;</div>                                                                    
                                      </div>                   
                                      <?php
                                    }
                                  }
                                  ?>                                  
                                </div>                                                        
                                <?php
                              }
                              ?>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                        <div class="form-actions center">
                          <button class="btn btn-sm btn-success" type="button" id="step_2"> <i class="ace-icon fa fa-arrow-left icon-on-left bigger-110"></i> Step 2 </button>
                          <button class="btn btn-sm btn-success" type="submit"> Step 4 <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> </button>
                        </div>
                      </form>
                    </div>
	               	</div>
	            </div>
	        </div>
    	</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('#step_2').click(function(){
      window.location = '<?php echo base_url(); ?>index.php/step2.html';
    });
});
</script>

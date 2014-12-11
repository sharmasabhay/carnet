<div class="page-content-area">
	<div class="page-header">
    	<h1>Admin page-­Create a layer step 2</h1>
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
	                  		<h4 class="widget-title">Define Data Sources for the blocks in your layer </h4>
	                	</div>
                    <div class="container-fluid">
                      <div>&nbsp;</div>
                      <?php echo form_open('',array('id' => 'create_layer_step2')); ?>
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
                                      $rel = $block_name1."_".strtolower($blockType.$bcImgKey);
                                      ?>
                                      <div class="row">
                                        <div class="<?php echo $bcCSS; ?>"><?php echo $blockType; ?></div>
                                        <div class="clear">&nbsp;</div>
                                        <div class="assignSource left">
                                          <div class="form-group">
                                            <label class="left"><b>Assign Data Point</b>&nbsp;</label>
                                            <?php
                                            echo form_dropdown('datapoints['.$rel.'][]', $assign_data['fields'],'','class="col-md-6"');
                                            ?>                                    
                                          </div> 
                                          <div class="clear">&nbsp;</div>                            
                                          <div class="form-group">
                                            <label class="left"><b>Assign CSS</b>&nbsp;</label>
                                            <?php
                                            echo form_dropdown('assigncss['.$rel.'][]', $assign_data['css'],'','class="col-md-6"');
                                            ?>                                    
                                          </div>          
                                          <div class="clear"><hr></div>                            
                                        </div>  
                                         <div class="left addMoreDatatypes" rel="<?php echo $rel; ?>"><i class="glyphicon glyphicon-plus"></i></div>    
                                         <div class="clear"></div> 
                                         <div class="assignSourceCnt left"></div>                                 
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
                          <button class="btn btn-sm btn-success" type="button" id="step_1"> <i class="ace-icon fa fa-arrow-left icon-on-left bigger-110"></i> Step 1 </button>
                          <button class="btn btn-sm btn-success" type="submit"> Step 3 <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> </button>
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
    $('#step_1').click(function(){
      window.location = '<?php echo base_url(); ?>index.php/step1.html';
    });
    $('.addMoreDatatypes').click(function(){
      var rel = $(this).attr('rel');
      var selectLen = parseInt($(this).parent().find('.assignSourceCnt select[name^="datapoints"]').length)+1;
      if(selectLen>2){
        alert("Datapoints should not grater than 3.");
        return false;
      }

      var html = '';
      html += '<div><div class="left">';
      html += $('.assignSource').html();
      html += '</div><div class="left removeDatatypes"><i class="glyphicon glyphicon-remove"></i></div><div class="clear"></div></div>';
      $(this).parent().find('.assignSourceCnt').append(html);
    });

    $('body').on('click', '.removeDatatypes', function(){
      $(this).parent().remove();
    });
});
</script>

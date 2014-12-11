<div class="page-content-area">
	<div class="page-header">
    	<h1>Admin page-­Create a layer step 1</h1>
    </div>
    <!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12"> 
        	<!-- PAGE CONTENT BEGINS -->
          	<!-- <div class="alert alert-block alert-success">            	
            	<i class="ace-icon fa fa-check green"></i> 
            	Welcome to Travel With Carnet 
            </div> -->
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
	                  		<h4 class="widget-title">Create	a layer</h4>
	                	</div>
                    <div>&nbsp;</div>
                    <div class="container-fluid">
                      <div class="panel panel-default">
                        <?php
                        if(!empty($block_combination)){
                          ?>
                          <div class="panel-body">
                            <div class="sliderArrow">
                              <a href="javascript:void(0);" class="scrollPrev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            </div>
                            <div class="jcarousel col-md-10">
                              <ul>
                                <?php
                                foreach ($block_combination['css'] as $key => $blockCssArr) {
                                  $block_name1 = str_replace('+','',$key);
                                  $block_name1 = str_replace('-','',$block_name1);
                                  $block_name1 = strtolower($block_name1);

                                  foreach ($blockCssArr as $csskey => $classname) {
                                    $blockType = strtoupper($block_combination['type'][$key][$csskey]);
                                    ?>                                  
                                    <li>
                                      <div class="<?php echo $classname; ?> selectBlocks" rel="<?php echo $block_name1."_".strtolower($blockType.$csskey); ?>"><?php echo $blockType; ?></div>
                                      <div class="selectBlockSize">&nbsp;</div>
                                    </li>                                  
                                    <?php
                                  }                              
                                }
                                ?>  
                              </ul>                 
                            </div>
                            <div class="sliderArrow">
                              <a href="javascript:void(0);" class="scrollNext"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>         
                          </div>
                          <?php
                        }
                        ?>
                      </div> 
                      <div class="col-md-12">
                        <div class="">
                          <b>Your layer totals <span id="totalblocks">###</span>. Continue selecting blocks up to <span id="blockupto">989</span> pixels (totals = <span id="totalwidth"></span>)</b>
                        </div>  
                        <div class="blocksCnt">
                          <?php
                          $sessionBlockIds = array();
                          if(!empty($session_data)){
                            foreach ($session_data['css'] as $sesskey => $sessarr) {
                              $block_name1 = str_replace('+','',$sesskey);
                              $block_name1 = str_replace('-','',$block_name1);
                              $block_name1 = strtolower($block_name1);
                              foreach ($sessarr as $csskey => $classname) {
                                $blockType = strtoupper($block_combination['type'][$key][$csskey]);
                                $rel = $block_name1."_".strtolower($blockType.$csskey);
                                $sessionBlockIds[] = $rel;
                                ?>
                                <div class="left">
                                  <div class="<?php echo $classname; ?> selectBlocks" rel="<?php echo $rel; ?>"><?php echo $blockType; ?></div>
                                  <div class="selectBlockSize">&nbsp;</div>
                                </div>
                                <?php
                              }
                            }
                          }
                          ?>
                        </div>
                      </div>                     
                      <?php echo form_open('',array('id' => 'create_layer_step1')); ?>
                        <input type="hidden" name='blockids' id='blockids' value="<?php echo @implode(',',$sessionBlockIds); ?>">
                        <div class="form-group">
                          <b>Name of your layer</b>
                          <input type="text" class="form-control" id="nameofyourlayer" name="nameofyourlayer" value="<?php echo @$session_data['nameofyourlayer']; ?>" placeholder="Please enter your layer name">
                        </div>
                        <div class="form-group">
                          <b>Select Content Type</b>
                          <select name="content_type" id="content_type" class="form-control">
                            <option>Select Content Type</option>
                            <option value="1" <?php echo @($session_data['content_type']==1) ? 'selected' : ''; ?>>Events</option>
                            <option value="2" <?php echo @($session_data['content_type']==2) ? 'selected' : ''; ?>>Article</option>
                            <option value="3" <?php echo @($session_data['content_type']==3) ? 'selected' : ''; ?>>Review</option>
                          </select>
                        </div>
                        <div class="form-actions center">
                          <button class="btn btn-sm btn-success" type="button" id="dashboard"> <i class="ace-icon fa fa-arrow-left icon-on-left bigger-110"></i> Dashboard </button>
                          <button class="btn btn-sm btn-success" type="submit"> Step 2 <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> </button>
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
var blockWidth = 0;
var BLOCK_TOTAL_WIDTH = 989;
$(document).ready(function(){
  $('.jcarousel').jcarousel();

  $('.scrollPrev')
    .jcarouselControl({
      target: '-=1'
  });

  $('.scrollNext')
    .jcarouselControl({
      target: '+=1'
  });

  $('#dashboard').click(function(){
    window.location = '<?php echo base_url(); ?>index.php/';
  });
  
  $('.selectBlocks').each(function(){
    var height = $(this).height();
    var width = $(this).width();
    $(this).parent().find('.selectBlockSize').html('('+width+' x '+height+') pixels');

    $('#totalblocks').html($('.blocksCnt .selectBlocks').length);

    var totalWidth = 0;
    $('.blocksCnt .selectBlocks').each(function(){
      totalWidth = totalWidth+$(this).width();
    });
    $('#totalwidth').html(totalWidth);
    $('#blockupto').html(BLOCK_TOTAL_WIDTH-totalWidth);
  });

  $('.jcarousel .selectBlocks').click(function(){
    var width = $(this).width();
    var blockName = $(this).attr('rel');
      
    if($(this).hasClass('blockCombinations_selected')){
      $("#blockids").removeFromArray(blockName);
      $(this).removeClass('blockCombinations_selected');  
      blockWidth = blockWidth-width;    
    }else{
      blockWidth += width; 
      if(blockWidth<BLOCK_TOTAL_WIDTH){
        $("#blockids").addToArray(blockName); 
        $(this).addClass('blockCombinations_selected');  
        $('#totalblocks').html($('.jcarousel .blockCombinations_selected').length);  
        $('#totalwidth').html(blockWidth);
        $('#blockupto').html(BLOCK_TOTAL_WIDTH-blockWidth);
      }else{      
        blockWidth = blockWidth-width;  
        alert('Block sizes not grater then '+BLOCK_TOTAL_WIDTH+' px.');      
      }    
    }

    $('#totalwidth').html(blockWidth);
    $('#blockupto').html(BLOCK_TOTAL_WIDTH-blockWidth);
    $('#totalblocks').html($('.jcarousel .blockCombinations_selected').length);  

    var html = '';
    $('.jcarousel .blockCombinations_selected').each(function(){
      html += '<div class="left">';
      html += $(this).parent().html();
      html += '</div>';
    });
    $('.blocksCnt').html(html);
  });

  jQuery.fn.extend({
    addToArray: function(value) {
      return this.filter(":input").val(function(i, v) {
        var arr = v.split(',');
        arr.push(value);
        return arr.join(',');
      }).end();
    },
    removeFromArray: function(value) {
      return this.filter(":input").val(function(i, v) {
        return $.grep(v.split(','), function(val) {  
          return val != value;
        }).join(',');
      }).end();
    }
  });
});
</script>

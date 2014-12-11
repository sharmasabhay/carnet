<div class="page-content-area">
  <div class="page-header">
      <h1>Create a page template </h1>
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
                        <h4 class="widget-title">Name Your Template to Create or Select existing to modify </h4>
                    </div>
                    <div class="container-fluid">
                      <div>&nbsp;</div>
                      <?php echo form_open('',array('id' => 'create_layer_step6')); ?>
                        <input type="hidden" name='blockids' id='blockids' value="">
                        <div class="panel panel-default">
                          &nbsp;                        
                        </div>
                        <div class="form-actions center">
                          <button class="btn btn-sm btn-success" type="button" id="step_5"> <i class="ace-icon fa fa-arrow-left icon-on-left bigger-110"></i> Step 5 </button>
                          <button class="btn btn-sm btn-success" type="submit"> Save template </button>
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
    $('#step_5').click(function(){
      window.location = '<?php echo base_url(); ?>index.php/step5.html';
    });
});
</script>

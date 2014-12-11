<div class="page-content-area">
  <div class="page-header">
      <h1>Dashboard</h1>
    </div>
    <!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12"> 
           <div class="row">
              <div class="col-sm-12">
                  <div class="right"><a href="<?php echo base_url(); ?>index.php/step1/" class="btn btn-success">Add Layer</a></div>
                  <div class="clear"></div>
                  <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Templates list</h4>
                    </div>
                    <div class="container-fluid">
                      <table class="table">
                        <thead>
                          <tr>
                            <th width="6%">Sr. No.</th>
                            <th width="45%" nowrap>Layer name</th>
                            <th width="14%">No. of Blocks</th>
                            <th width="35%">Actions</th>
                          </tr>
                        </thed>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Template First</td>
                            <td align="center">3</td>
                            <td>
                              <button type="button" class="btn btn-primary">Published</button>
                              <button type="button" class="btn btn-success">Edit</button>
                              <button type="button" class="btn btn-danger">Delete</button>
                              <button type="button" class="btn btn-info">Preview</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<script>
var blockWidth = 0;
$(document).ready(function(){
  $('.selectBlocks').click(function(){
    if($(this).hasClass('blockCombinations_selected')){
      $("#blockids").removeFromArray(blockName);
      $(this).removeClass('blockCombinations_selected');
    }else{
      var width = $(this).width();
      blockWidth += width; 
      var blockName = $(this).attr('rel');
      if(blockWidth<989){
        $("#blockids").addToArray(blockName); 
        $(this).addClass('blockCombinations_selected');    
      }else{
        blockWidth = blockWidth-width;
        alert('Block sizes not grater then 989 px.');      
      }    
    }
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
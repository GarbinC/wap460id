<div class="pageheader">
  <h2><i class="fa fa-home"></i> 栏目管理 <span>添加/编辑栏目</span></h2>
  
</div>
<div class="contentpanel">
	<div class="row">
      <div class="col-md-12">
          <form id="category_save" action="" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">添加 / 编辑 文章栏目</h4>
                
              </div>
              <div class="panel-body">                                
               <div class="form-group">
                  <label class="col-sm-3 control-label">栏目名称 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="catname" value="<?php echo @$category_msg['catname'];?>" class="form-control" placeholder="输入栏目名称,最多16个字符..." />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">父级栏目 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                  	 <select id="pid" name="parentid" class="form-control mb15">
                  	 	<option value=0>作为一级栏目</option>
                  	 	<?php
                  	 		echo $category_tree;
                  	 	?>
                  	 </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">封面图 <span class="asterisk">*</span></label>
                  <div class="col-sm-4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="input-append">
                    <div style="width:170px;" class="uneditable-input">
                      <i class="glyphicon glyphicon-file fileupload-exists"></i>
                      <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                      <span class="fileupload-new">选择文件</span>
                      <span class="fileupload-exists">重选</span>
                      <input onchange='ajaxFileUplaod( this , "#imageurl" , "#img_preview");' name="image" id="image" type="file" />
                      <input type="hidden" value="" autocomplete='off' id="imageurl" name="imageurl" />
                    </span>
                    <a href="#" class="btn btn-default" onclick="deletePreviewImg( 'imageurl' , '#img_preview'); return false;" data-dismiss="fileupload">删除</a>
                  </div>
                </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-3">
                    <image src="<?php 
                      if( @$category_msg['imageurl'])
                        echo base_url( $category_msg['imageurl']);
                      else
                        echo ADMIN_IMG_PATH . 'noimage.png';
                     ?>" id="img_preview" src=""  />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">排序 </label>
                  <div class="col-sm-3">
                    <input type="text" name="sortrank" value="<?php echo @$category_msg['sortrank'];?>" class="form-control" placeholder="输入排序数字，数字越大，该栏目显示越靠前..." />
                  </div>
                </div>

              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">                     
                    <button type="submit" class="btn btn-primary">提交</button>
                   </div>
                </div>
              </div>
            <!-- hidden value -->
            <input type="hidden" value="<?php echo @$category_msg['id'];?>" name="catid" />
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->



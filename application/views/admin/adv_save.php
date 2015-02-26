<div class="pageheader">
  <h2><i class="fa fa-home"></i> 广告管理 <span>添加/编辑广告项</span></h2>
  
</div>
<div class="contentpanel">
	<div class="row">
      <div class="col-md-12">
          <form id="adv_save" action="" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">添加 / 编辑 广告项</h4>
                
              </div>
              <div class="panel-body">   

               <div class="form-group">
                  <label class="col-sm-2 control-label">标题 <span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="title" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="此处标题为鼠标放在图片上显示的文字..." />
                  </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">封面图 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
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
                      <input type="hidden" value="" id="imageurl" autocomplete='off' name="imageurl" />
                    </span>
                    <a href="#" class="btn btn-default" onclick="deletePreviewImg( 'imageurl' , '#img_preview'); return false;" data-dismiss="fileupload">删除</a>
                  </div>
                </div>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <image src="<?php 
                      if( @$adv_msg['imageurl'])
                        echo base_url( $adv_msg['imageurl']);
                      else
                        echo ADMIN_IMG_PATH . 'noimage.png';
                     ?>" id="img_preview" src=""  />
                  </div>
                </div>
                
                <!-- <div class="form-group">
                  <label class="col-sm-2 control-label">所属广告位 </label>
                  <div class="col-sm-3">
                  	 <select id="cid" name="catid" class="form-control mb15">                  	 	
                  	 	<?php
                  	 		if( isset( $category_msg) && !empty( $category_msg)){
                          foreach( $category_msg as $k => $v){
                            echo "<option value='{$v['id']}'>{$v['catname']}</option>";
                          }
                        }
                  	 	?>
                  	 </select>
                  </div>
                </div>   -->           
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">跳转链接 </label>
                  <div class="col-sm-3">
                    <input type="text" name="jumpurl" value="<?php echo @$adv_msg['jumpurl'];?>" class="form-control" placeholder="点击图片后跳转的网址域名..." />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">排序 </label>
                  <div class="col-sm-3">
                    <input type="text" name="sortrank" value="<?php echo @$adv_msg['sortrank'];?>" class="form-control" placeholder="输入排序数字，数字越大，该栏目显示越靠前..." />
                  </div>
                </div>
              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-2">                     
                    <button type="submit" class="btn btn-primary">提交</button>
                   </div>
                </div>
              </div>
            <!-- hidden value -->
            <input type="hidden" value="<?php echo @$adv_msg['id'];?>" name="advid" />
            <input type="hidden" value="24" name="catid" />
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->

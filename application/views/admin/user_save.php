<div class="pageheader">
  <h2><i class="fa fa-home"></i> 会员管理 <span>添加/编辑会员</span></h2>
  
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
                <h4 class="panel-title">添加 / 编辑 会员</h4>
                
              </div>
              <div class="panel-body">   

               <div class="form-group">
                  <label class="col-sm-2 control-label">用户名 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="username" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="password" name="password" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">确认密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="password" name="confirm_pwd" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

             <div class="form-group">
                  <label class="col-sm-2 control-label">姓名 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="title" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">邮箱 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="email" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">电话 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="mobile" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">地址 <span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="address" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">合同编号 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="hetong" value="<?php echo @$adv_msg['title'];?>" class="form-control" placeholder="" />
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

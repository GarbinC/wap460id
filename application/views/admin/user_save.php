<div class="pageheader">
  <h2><i class="fa fa-home"></i> 会员管理 <span>添加/编辑会员</span></h2>
  
</div>
<div class="contentpanel">
	<div class="row">
      <div class="col-md-12">
          <form id="user_save" action="" class="form-horizontal">
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
                    <input type="text" name="username" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="password" name="password" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">确认密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="password" name="confirm_pwd" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

             <div class="form-group">
                  <label class="col-sm-2 control-label">姓名 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="tname" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">邮箱 </label>
                  <div class="col-sm-3">
                    <input type="text" name="email" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">电话 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="mobile" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">现住址 </label>
                  <div class="col-sm-6">
                    <input type="text" name="address" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">合同编号 </label>
                  <div class="col-sm-3">
                    <input type="text" name="hetong" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">施工地点 </label>
                  <div class="col-sm-6">
                    <input type="text" name="shigongdidian" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">施工进度 </label>
                  <div class="col-sm-3">
                    <input type="text" name="shigongjindu" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">QQ </label>
                  <div class="col-sm-3">
                    <input type="text" name="qq" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">微信 </label>
                  <div class="col-sm-3">
                    <input type="text" name="weichat" value="<?php echo @$user_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">备注 </label>
                  <div class="col-sm-6">
                    <textarea rows='5' cols="90" name="remark"></textarea>
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
            <input type="hidden" value="<?php echo @$user_msg['id'];?>" name="advid" />
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->

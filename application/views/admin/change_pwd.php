<div class="pageheader">
  <h2><i class="fa fa-pencil"></i> 系统设置 <span>密码修改</span></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">当前位置：</span>
    <ol class="breadcrumb">
      <li><a href="#">系统设置</a></li>
      <li class="active">密码修改</li>
    </ol>
  </div>
</div>
<div class="contentpanel">
    <div class="row">
      <div class="col-md-12">
          <form id="change_pwd" action="" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">修改系统管理员密码</h4>
                <p>密码修改后，您将退出登录，请用新密码重新登陆</p>
              </div>
              <div class="panel-body">                                
               <div class="form-group">
                  <label class="col-sm-3 control-label">原始密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" name="old_pwd" class="form-control" placeholder="输入当前密码..." />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">新密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" id="new_pwd" name="new_pwd" class="form-control" placeholder="输入新密码..." />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">确认新密码 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" name="confirm_pwd" class="form-control" placeholder="重新输入新密码..." />
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
            
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->
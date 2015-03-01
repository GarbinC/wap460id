<div class="pageheader">
  <h2><i class="fa fa-home"></i> 会员管理 <span>添加/编辑施工节点信息</span></h2>
  
</div>
<div class="contentpanel">
	<div class="row">
      <div class="col-md-12">
          <form id="jiedian_save" action="" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">添加 / 编辑 施工节点信息</h4>
                
              </div>
              <div class="panel-body">   

               <div class="form-group">
                  <label class="col-sm-2 control-label">标题 <span class="asterisk">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" name="title" value="<?php echo @$jiedian_msg['title'];?>" class="form-control" placeholder="" />
                  </div>
                </div>

               
                <div class="form-group">
                  <label class="col-sm-2 control-label">节点 </label>
                  <div class="col-sm-3">
                  	 <select id="jname" name="jname" class="form-control mb15">                  	 	
                  	 	<option value="交底">交底</option>
						<option value="隐蔽工程">隐蔽工程</option>
						<option value="中期">中期</option>
						<option value="主材量尺">主材量尺</option>
						<option value="洁具吊顶安装">洁具吊顶安装</option>
						<option value="木作安装">木作安装</option>
						<option value="硬装竣工">硬装竣工</option>
						<option value="软装配饰安装">软装配饰安装</option>
						<option value="家具家电进场">家具家电进场</option>
						<option value="工程完工">工程完工</option>
						<option value="相关单据">相关单据</option>
                  	 </select>
                  </div>
                </div>

            
                <div class="form-group">
                  <label class="col-sm-2 control-label">内容 </label>
                  <div class="col-sm-6">
                    <textarea rows='5' cols="90" name="content"><?php echo @$jiedian_msg['content']; ?></textarea>
                  </div>
                </div>

                
              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-2">                     
                    <button type="submit" class="btn btn-primary">提交</button>
                     <button onclick="javascript:history.go(-1); return false;" type="submit" class="btn btn-primary">返回</button>
                   </div>
                </div>
              </div>
            <!-- hidden value -->
            <input type="hidden" value="<?php echo @$jiedian_msg['id'];?>" name="jiedian_id" />
            <input type="hidden" value="<?php echo @$member_id;?>" name="member_id" />
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->

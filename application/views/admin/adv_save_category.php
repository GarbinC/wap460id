<div class="pageheader">
  <h2><i class="fa fa-home"></i> 广告管理 <span>添加/编辑广告位</span></h2>
  
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
                <h4 class="panel-title">添加 / 编辑 广告位</h4>
                
              </div>
              <div class="panel-body">                                
               <div class="form-group">
                  <label class="col-sm-3 control-label">广告位名称 <span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="catname" value="<?php echo @$adv_msg['catname'];?>" class="form-control" placeholder="输入广告位名称,最多16个字符..." />
                    <input type="hidden" value="1" name="type" />
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
            <input type="hidden" value="<?php echo @$adv_msg['id'];?>" name="catid" />
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->



<div class="pageheader">
  <h2><i class="fa fa-home"></i> 文章管理 <span>添加/编辑文章</span></h2>
  
</div>
<div class="contentpanel">
	<div class="row">
      <div class="col-md-12">
          <form id="article_save" action="" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">添加 / 编辑 文章</h4>
                
              </div>
              <div class="panel-body">                                
               <div class="form-group">
                  <label class="col-sm-2 control-label">标题 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="title" value="<?php echo @$art_msg['title'];?>" class="form-control" placeholder="输入栏目名称,最多16个字符..." />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">文章栏目 </label>
                  <div class="col-sm-3">
                  	 <select id="cid" name="catid" class="form-control mb15">                  	 	
                  	 	<?php
                  	 		echo $category_tree;
                  	 	?>
                  	 </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-2 control-label">简介 </label>
                  <div class="col-sm-3">
                    <textarea class="form-control" name="description" rows="4"><?php echo @$art_msg['description'];?></textarea>
                  </div>
                </div>                
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">排序 </label>
                  <div class="col-sm-3">
                    <input type="text" name="sortrank" value="<?php echo @$art_msg['sortrank'];?>" class="form-control" placeholder="输入排序数字，数字越大，该栏目显示越靠前..." />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">内容 <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <script id="container" name="content" type="text/plain"> 
                    <?php echo @$art_msg['content'];?>   
                    </script>
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
            <input type="hidden" value="<?php echo @$art_msg['id'];?>" name="artid"/>
          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
    </div>
</div><!-- contentpanel -->

<script type="text/javascript" src="<?php echo base_url( 'statics/ue/ueditor.config.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url( 'statics/ue/ueditor.all.js');?>"></script>
 <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>

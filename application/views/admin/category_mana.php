<div class="pageheader">
  <h2><i class="fa fa-pencil"></i> 栏目管理 <!-- <span>密码修改</span> --></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">当前位置：</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url( 'category/mana');?>">栏目管理</a></li>
      <!-- <li class="active">密码修改</li> -->
    </ol>
  </div>
</div>
<div class="contentpanel">
 <div class="panel panel-default">        
        <div class="panel-body">
           <!--  <h5 class="subtitle mb5"></h5> -->            
            <button onclick='jumpTo("<?php echo site_url( 'category/save/add');?>"); return false;' class="btn btn-primary btn-sm">添加栏目</button>            
          <hr>
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>                    
                    <th>分类名称</th>
                    <th>文章数量</th>
                    <th>排序</th>
                    <th>操作</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                   if( isset( $category_str) && $category_str)
                    echo $category_str;
                ?>        
              </tbody>
           </table>           
          </div><!-- table-responsive -->          
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel-->
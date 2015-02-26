<div class="pageheader">
  <h2><i class="fa fa-pencil"></i> 文章管理 <!-- <span>密码修改</span> --></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">当前位置：</span>
    <ol class="breadcrumb">
      <li><a href="#">文章管理</a></li>    
    </ol>
  </div>
</div>
<div class="contentpanel">
 <div class="panel panel-default">        
        <div class="panel-body">
            <div class="row">
              <div class="col-sm-1"><button onclick='jumpTo("<?php echo site_url( 'article/save/');?>"); return false;' class="btn btn-primary btn-sm">添加文章</button>  </div>
              <div class="col-sm-2">
                <select id="filter_opt" style="padding:8px;" class="form-control">
                  <option value='0'>所有栏目</option>
                  <?php
                    if(!empty( $category_tree))
                      echo $category_tree;
                  ?>
                </select>    
              </div>
            </div>          

          <hr>
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>                    
                    <th>标题</th>
                    <th>发布时间</th>
                    <th>排序</th>
                    <th>操作</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                  if( isset( $art_msg['msg']) && !empty( $art_msg['msg'])){
                    foreach( $art_msg['msg'] as $k => $v){
                      $inputtime = date( 'Y-m-d H:i:s' , $v['createtime']);
                      echo "<tr><td>{$v['title']}</td><td>{$inputtime}</td><td>{$v['sortrank']}</td>
                      <td>
                        <a href='".site_url( 'article/save/'.$v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"deleteOneMsg( 'article' , {$v['id']}); return false;\"><span class='glyphicon glyphicon-remove'></span></a>
                      </td></tr>";
                    }
                  }
                ?>     
              </tbody>
           </table>
           <?php
            if( isset( $art_msg['links']) && !empty( $art_msg['links']))
              echo $art_msg['links'];
           ?>     
          </div><!-- table-responsive -->
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel-->
<div class="pageheader">
  <h2><i class="fa fa-pencil"></i> 会员管理 / 会员节点列表 <!-- <span>密码修改</span> --></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">当前位置：</span>
    <ol class="breadcrumb">
      <li><a href="#">会员管理 / 会员节点列表</a></li>    
    </ol>
  </div>
</div>
<div class="contentpanel">
 <div class="panel panel-default">        
        <div class="panel-body">
             <div class="row">
              <div class="col-xs-6">
              <!--   <input type='text' name='keyword'  /> <button onclick="searchMember();return false;" style="display:inline-block;padding-top:2px;padding-bottom:2px;" class="btn btn-primary btn-sm">搜索</button>
                 <button onclick="javascript:window.location.reload();" style="display:inline-block;padding-top:2px;padding-bottom:2px;" class="btn btn-primary btn-sm">取消</button> -->
              当前会员：<?php echo $cur_mem['tname'];?>
              </div>
            </div>       
          <hr>
          <div class="table-responsive">
          <table  class="table" id="table2">
              <thead>
                 <tr>                    
                    <th>标题</th>
                    <th>生成时间</th>
                    <th>节点类型</th>                   
                    <th>操作</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                  if( isset( $jiedian_msg) && !empty( $jiedian_msg)){
                    foreach( $jiedian_msg as $k => $v){
                      $inputtime = date( 'Y-m-d' , $v['createtime']);
                      echo "<tr><td>{$v['title']}</td><td>{$inputtime}</td><td>{$v['jname']}</td>                      
                      <td>
                        <a href='".site_url( 'member/save_jiedian/'.$v['mid'] . '/' . $v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"deleteOneMsg( 'jiedian' , {$v['id']}); return false;\"><span class='glyphicon glyphicon-remove'></span></a>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a onclick='setContent( \"{$v['id']}\"); return false;' data-toggle='modal' data-target='.bs-example-modal-lg' href='#'><span class='fa  fa-search-plus'></span></a></td></tr>";
                    }
                  }
                ?>     
              </tbody>
           </table>
           
          </div><!-- table-responsive -->
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel-->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h4 class="modal-title">节点内容</h4>
        </div>
        <div id="jiedian_content" class="modal-body"></div>
    </div>
  </div>
</div>
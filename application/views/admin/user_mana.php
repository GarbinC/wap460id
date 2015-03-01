<div class="pageheader">
  <h2><i class="fa fa-pencil"></i> 会员管理 <!-- <span>密码修改</span> --></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">当前位置：</span>
    <ol class="breadcrumb">
      <li><a href="#">会员管理</a></li>    
    </ol>
  </div>
</div>
<div class="contentpanel">
 <div class="panel panel-default">        
        <div class="panel-body">
            <div class="row">
              <div class="col-xs-6">
                <input type='text' name='keyword'  /> <button onclick="searchMember();return false;" style="display:inline-block;padding-top:2px;padding-bottom:2px;" class="btn btn-primary btn-sm">搜索</button>
                 <button onclick="javascript:window.location.reload();" style="display:inline-block;padding-top:2px;padding-bottom:2px;" class="btn btn-primary btn-sm">取消</button>
              </div>
            </div>          
          <hr>
          <div class="table-responsive">
          <table  class="table" id="table2">
              <thead>
                 <tr>                    
                    <th>账号</th>
                    <th>姓名</th>
                    <th>电话</th>
                    <th>邮箱</th>
                    <th>合同编号</th>
                    <th>生成时间</th>
                    <th>操作</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                  if( isset( $member_msg['msg']) && !empty( $member_msg['msg'])){
                    foreach( $member_msg['msg'] as $k => $v){
                      $inputtime = date( 'Y-m-d' , $v['createtime']);
                      echo "<tr><td>{$v['username']}</td><td>{$v['tname']}</td><td>{$v['mobile']}</td><td>{$v['email']}</td><td>{$v['hetong']}</td>
                      <td>{$inputtime}</td>
                      <td>
                        <a href='".site_url( 'member/save/'.$v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"deleteOneMsg( 'member' , {$v['id']}); return false;\"><span class='glyphicon glyphicon-remove'></span></a>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='".site_url( 'member/save_jiedian/'.$v['id'])."'><span class='glyphicon glyphicon-plus'></span></a>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='".site_url( 'member/jiedian_list/'.$v['id'])."'><span class='fa fa-bars'></span></a></td></tr>";
                    }
                  }
                ?>     
              </tbody>
           </table>
           <?php
            if( isset( $member_msg['links']) && !empty( $member_msg['links']))
              echo $member_msg['links'];
           ?>     
          </div><!-- table-responsive -->
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel-->
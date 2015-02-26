<div class="pageheader">
  <h2><i class="fa fa-pencil"></i> 广告管理 <!-- <span>密码修改</span> --></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">当前位置：</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url( 'category/mana');?>">广告管理</a></li>
      <!-- <li class="active">密码修改</li> -->
    </ol>
  </div>
</div>
<div class="contentpanel">
 <div class="panel panel-default">        
        <div class="panel-body">
           <!--  <h5 class="subtitle mb5"></h5> -->            
         <!--    <button onclick='jumpTo("<?php echo site_url( 'adv/save/add');?>"); return false;' class="btn btn-primary btn-sm">添加广告位</button>            
           <hr>-->
          <div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>                    
                    <th>标题</th>
                    <th>跳转链接</th>                    
                    <th>排序</th>                    
                    <th>操作</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                  if( isset( $adv_msg) && !empty( $adv_msg)){
                    foreach( $adv_msg as $k => $v){
                     // $adv_count = $this->common->getTotalRows( array( 'tablename' => 'adv' , 'where' =>array( 'catid' => $v['id'])));
                      echo "<tr><td>{$v['title']}</td><td>".$v['jumpurl']."</td><td>{$v['sortrank']}</td>
                      <td><a href='".site_url( 'adv/save_adv/'.$v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a onclick=\"deleteOneMsg( 'adv' , {$v['id']}); return false;\" href='#'><span class='glyphicon glyphicon-remove'></span></a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".site_url( 'adv/save_adv')."'><span class='glyphicon glyphicon-plus'></span></a></td></tr>";
                    }
                  }
                ?>    
              </tbody>
           </table>           
          </div><!-- table-responsive -->          
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel-->
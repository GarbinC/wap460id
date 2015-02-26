<body>
<div>
</div>

    <div data-role="page" id="page">
<div data-role="header" class="header">
     <a href="#" data-rel="back" data-role="none" class="back"><img src="<?php echo base_url( 'statics/images/battery.png');?>" /></a>
     <h1><?php echo $cur_category['catname']?></h1>
     <div class="clear"></div>
  </div>
  <div data-role="content" class="main">
    <div class="case_left">
         <ul>
             <li ><a href="<?php echo site_url( 'content/lists/'.$cur_catid);?>" >全部</a></li>             
                  <?php
                    if( isset( $sub_category) && !empty( $sub_category)){
                      foreach ($sub_category as $key => $v) {
                        $class = '';
                        if( $v['id'] == $cur_category['id'])
                          $class = 'class="cur"';
                         echo '<li '.$class.' ><a href="'.site_url( 'content/lists/'.$v['id']).'">'.$v['catname'].'</a></li>';
                      }
                    }
                  ?>                                                                               
         </ul>
      </div>
      <div class="case_right">
          <ul>
              <?php
                if( isset( $art_msg) && !empty( $art_msg)){
                  foreach ($art_msg as $key => $value) {
                    $imageurl = get_first_img( $value['content']);
                    echo '<li>
                     <a href="'.site_url( 'content/show/'.$value['id']).'">
                         <div class="pic"><img src="'.$imageurl.'" /></div>
                         <div class="box">
                            <h1>'.$value['title'].'</h1>
                            <p>'.mb_substr( $value['description'] , 0 , 13 , 'utf-8').'</p>
                         </div>
                         <div class="clear"></div>
                     </a>
                  </li>';
                  }
                }
              ?>                 
          </ul>
      </div>
      <div class="clear"></div>
  </div>
 
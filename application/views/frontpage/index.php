<html>
<head><title>
	460国际设计
</title>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <meta name="keywords" content=460国际设计 /> 
    <meta name="description" content=460国际设计 />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo base_url( 'statics/css/jquery.mobile-1.4.2.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url( 'statics/css/css.css');?>" rel="stylesheet" />
    <script src="<?php echo base_url('statics/js/jquery.js');?>" ></script>
    <script src="<?php echo base_url('statics/js/jquery.mobile-1.4.2.min.js');?>"></script>
    <script src="<?php echo base_url('statics/js/common.js');?>"></script>
</head>
<body>
<div>
</div>
    <div data-role="page" id="page">
  <div data-role="content" id="home">
        <div class="slider">
             
              <ul>    
                   <?php
                        if( isset( $banner_msg) && !empty( $banner_msg)){
                          foreach( $banner_msg as $k=>$v){
                            echo '<li><a href="'.$v['jumpurl'].'" ><img src="'.$v['imageurl'].'" ></a></li>';
                          }
                        }
                      ?>   
              </ul>
                                  
            
         </div>
          <script type="text/javascript" src="<?php echo base_url('statics/js/yxMobileSlider.js');?>" tppabs="http://60.28.240.121:7045/mobile/js/yxMobileSlider.js"></script>
          <script>
              $(".slider").yxMobileSlider({ width: 640, height: 267, during: 3000 })
          </script>
        <div class="index_01">  
         <ul>
             
                  <li>
                      <a href="<?php echo site_url( 'content/lists/29');?>">
                         <img  src="<?php echo @$category_msg[0]['imageurl']?>">
                         <div class="title">460设计团队</div>
                      </a>
                    </li>
               
                  <li>
                      <a href="<?php echo site_url( 'content/lists/30');?>">
                         <img src="<?php echo @$category_msg[1]['imageurl']?>">
                         <div class="title">460设计案例</div>
                      </a>
                    </li>
               
           
         </ul> 
       </div>   
    
      <div class="index_03">
          <ul>
              
                     <?php
                      if( !empty( $category_msg[3])){
                        //dump( $category_msg);
                        for( $i = 3; $i< 7; $i++){
                          echo ' <li>
                                  <a href="'.site_url( 'content/lists/'.$category_msg[$i]['id']).'">
                                     <img src="'.$category_msg[$i]['imageurl'].'">
                                     <h1>'.$category_msg[$i]['catname'].'</h1>
                                  </a>
                               </li>';
                        }
                      }
                     ?>
                
          </ul>
      </div>

       <div class="index_02"> 
        <ul>
            <?php
              if( isset( $news_msg) && !empty( $news_msg)){
                foreach ($news_msg as $key => $value) {
                  $image = get_first_img( $value['content']);
                  echo '<li>
                     <a href="'.site_url( 'content/show/' . $value['id']).'">
                         <div class="pic"><img src="'.$image.'" /><div class="title"></div></div>
                           <h2>'.$value['title'].'</h2>
                           <p>'.mb_substr( $value['description'] , 0 , 40 , 'utf-8').'...</p>
                         <div class="clear"></div>
                     </a>
                  </li>';
                }
              }
            ?>                                                    
       </ul> 
      </div>


      <div class="clear"></div>
      <div style="margin-bottom:0px;" class="index_04">
         <h1>460设计案例</h1>
         <div class="fixbox">
            <ul>
              <?php
                if( isset( $case_msg) && !empty( $case_msg)){
                  foreach( $case_msg as $k=>$v){
                    $imageurl = get_first_img( $v['content']);
                    echo '<li>
                         <a href="'.site_url( 'content/show/'.$v['id']).'" tppabs="">
                            <div class="picsmal"><img src="'.$imageurl.'" ></div>
                            <div class="picbig"><img src="'.$imageurl.'"></div>
                            <div class="box"></div>
                            <div class="intro"><h4>'.$v['title'].'</h4></div>
                         </a>
                       </li>';
                  }
                }
              ?>                                    
            </ul>
            <div class="clear"></div>
         </div>
      </div>   

      <div style="margin-bottom:65px;" class="index_04">
         <h1>460设计团队</h1>
         <div class="fixbox">
            <ul>          
               <?php
                if( isset( $team_msg) && !empty( $team_msg)){
                  foreach( $team_msg as $k=>$v){
                    $imageurl = get_first_img( $v['content']);
                    echo '<li>
                         <a href="'.site_url( 'content/show/'.$v['id']).'" tppabs="">
                            <div class="picsmal"><img src="'.$imageurl.'" ></div>
                            <div class="picbig"><img src="'.$imageurl.'"></div>
                            <div class="box"></div>
                            <div class="intro"><h4>'.$v['title'].'</h4></div>
                         </a>
                       </li>';
                  }
                }
              ?>              
            </ul>
            <div class="clear"></div>
         </div>
      </div>
 <div class="clear"></div>

  </div>


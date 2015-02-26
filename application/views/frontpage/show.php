<body>
   <div data-role="page" id="page">
<div data-role="header" class="header">
     <a href="#" data-rel="back" data-role="none" class="back"><img src="<?php echo base_url( 'statics/images/battery.png');?>" /></a>
     <h1><?php echo $content_msg['title'];?></h1>
     <div class="clear"></div>
  </div>
    <div data-role="content" class="main">
     <div class="caseView">    
            <h4><font><?php echo $content_msg['description'] ?></font></h4>
            <div class="intro">
                <?php
                    echo $content_msg['content'];
                ?>
            </div>                   
     </div> 
  </div>
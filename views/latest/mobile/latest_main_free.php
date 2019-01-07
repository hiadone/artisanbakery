<section class="mainpg_news mainpg_txt_list">
    <h2 class="title01">NEWS & NOTICE</h2>
    <div class="txt_list01">
        
        <?php
        $i = 0;
        if (element('latest', $view)) {
            foreach (element('latest', $view) as $key => $value) {
        ?>
        <ul class="txt_list_ul">
            <li class="txt_list_li">
                <a href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
                    
                    <?php 
                    if(element('thumb_url', $value))
                        echo '<div class="txt_thum">
                        <img src="'.element('thumb_url', $value).'" alt="'.html_escape(element('title', $value)).'">
                        </div>';
                     ?>

                    <h4 class="txt_tit"><strong class="post_title"><?php echo html_escape(element('title', $value)); ?></strong><span class="post_views"><span class="blind">views</span><?php if(element('post_comment_count', $value)) echo '['.element('post_comment_count', $value).']' ;?></span></h4>
                    
                    <div class="txt_txt">
                        <?php echo html_escape(element('title', $value)) ?>
                    </div>

                    
                    
                </a>
                
            </li>
        </ul>
        <?php
                $i++;
            }
        }
        ?>
        
    </div>
    <div class="btn_box"><a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" class="btn_more btn-success">View More</a></div>
</section>

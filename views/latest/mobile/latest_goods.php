
<div class="main_box1 pull-left gallery_list02">
        
        
    <h3 class="title01"><?php echo html_escape(element('board_name', element('board', $view))); ?>'의 다른 메뉴</h3>
    <div class="swiper-container">
        <div class="swiper-wrapper">
    <?php
    $i = 0;
    if (element('latest_goods', $view)) {
        foreach (element('latest_goods', $view) as $key => $value) {
    ?>
        <div class="swiper-slide" >
            <a href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>"><div class="list_img"><img src="<?php echo element('thumb_url', $value); ?>" style="width:100%;"></div><h4 class="item_name"><?php echo html_escape(element('title', $value)); ?></h4>
            </a>
            
        </div>
    <?php
            $i++;
        }
    }
    ?>
        </div>
            <!-- Add Pagination -->
        <div class="swiper-pagination pagination_green"></div>
    </div>
    
    
</div>
<!-- Initialize Swiper -->
  
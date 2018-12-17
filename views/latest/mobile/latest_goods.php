<div class="main_box1 pull-left" style="background-color:#e5e5e5;">
    
        
        
    <?php echo html_escape(element('board_name', element('board', $view))); ?>
    <div class="swiper-container">
        <div class="swiper-wrapper">
    <?php
    $i = 0;
    if (element('latest_goods', $view)) {
        foreach (element('latest_goods', $view) as $key => $value) {
    ?>
        <div class="swiper-slide" >
            <a href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>"><?php echo html_escape(element('title', $value)); ?><img src="<?php echo element('thumb_url', $value); ?>" style="width:100%;">
            </a>
            
        </div>
    <?php
            $i++;
        }
    }
    ?>
        </div>
            <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    
    
</div>
<!-- Initialize Swiper -->
  
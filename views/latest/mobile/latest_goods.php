
<div class="main_box1  gallery_list02">
        
        

    <h3 class="title01"><i class="fa fa-quote-left" style="font-size:12px;vertical-align: top;padding-top:3px;"></i><?php echo html_escape(element('board_name', element('board', $view))); ?><i class="fa fa-quote-right mr10" style="font-size:12px;vertical-align: top;;padding-top:3px;"></i>의 다른 메뉴</h3>

    <div class="swiper-container">
        <div class="swiper-wrapper">
    <?php
    $i = 0;
    if (element('latest_goods', $view)) {
        foreach (element('latest_goods', $view) as $key => $value) {
    ?>
        <div class="swiper-slide list_box">
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
  
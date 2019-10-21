
    <div class="gallery_list06_container swiper-container <?php echo element('brd_key', element('board', $view)); ?> <?php echo element('active', element('config', $view)); ?>"  style="visibility: hidden; ?>">
        <ul class="gallery_list_ul swiper-wrapper">
        <?php
        $i = 0;
        if (element('latest_main', $view)) {
            foreach (element('latest_main', $view) as $key => $value) {
        ?>
            <li class="gallery_list_li swiper-slide">
                <a href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
                    <div class="list_img">
                        <img src="<?php echo element('thumb_url', $value); ?>" style="width:100%;">
                    </div>
                    <div class="list_txt">
                    <h4 class="item_name"><?php echo html_escape(element('title', $value)); ?></h4>

                    <!-- <p class="item_txt"><?php echo html_escape(element('post_sub_title', $value)); ?></p>-->

                    </div>
                    
                </a>
                
            </li>
        <?php
                $i++;
            }
        }
        ?>
        </ul>
        <!-- Add Pagination -->
         <div class="swiper-pagination dynamicBullets pagination_yellow"></div>
        <!-- Add Arrows -->
        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
    </div>
    <!-- Initialize Swiper -->



<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class=" mypage">
    
    <section class="">
        <h2 class="title10">회원 탈퇴</h2>
    </section>
    


    <section class="info_logout">
        <figure>
            <img src="../assets/images/temp/info_img/info_bye.png" alt="bye">
            <figcaption>
               <p >안녕하세요 <b class="text-primary"><?php echo html_escape($this->member->item('mem_nickname')); ?></b>님, <br />
                회원님의 탈퇴가 정상적으로 진행되었습니다.<br />
                그 동안 저희 사이트를 이용해주셔서 감사합니다.
                </p> 
            </figcaption>
        </figure>

        <button class="btn_more btn-success">
            <a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>" >홈페이지로 이동</a>
        </button> 
    </section>

    

        <section class="ad" style="margin-bottom:0;">
        <h4 class="hidden">ad</h4>
        <?php echo banner("review_post_banner_1") ?>
    </section>
</div>

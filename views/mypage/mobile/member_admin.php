<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class=" mypage">

    <section class="">
        <h2 class="title10">관리자 회원</h2>
    </section>

    <section class="info_table">
        <table>
            <tr>
                <td class="active">
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">내 작성글</a>
                </td>
                
            </tr>
        </table>
    </section>
    
    
     <section class="logout">
            <h2 style="text-align: center;">
            <img src="<?php echo base_url('/assets/images/temp/stop.png') ?>" alt="stop">
            </h2>
            <div class="alert alert-dismissible alert-info infoalert">
        <span id="return_message">관리자회원정보는 관리자페이지에서만 수정이 가능합니다.</span>
    </div>
    </section>
    
</div>

<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/page.css?'.$this->cbconfig->item('browser_cache_version')); ?>
<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css?'.$this->cbconfig->item('browser_cache_version')); ?>
<?php    $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); ?>

<?php
if (element('syntax_highlighter', element('board', $view)) OR element('comment_syntax_highlighter', element('board', $view))) {
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shCore.css'));
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shThemeMidnight.css'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shCore.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushJScript.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushPhp.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushCss.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushXml.js'));
?>
    <script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf = '<?php echo base_url('assets/js/syntaxhighlighter/scripts/clipboard.swf'); ?>';
    var is_SyntaxHighlighter = true;
    SyntaxHighlighter.all();
    </script>
<?php } ?>

<?php echo element('headercontent', element('board', $view)); ?>

<div class="wrap02  post_wrap">
    <?php echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>'); ?>
   <!--  <h3>
        <?php if (element('category', element('post', $view))) { ?>[<?php echo html_escape(element('bca_value', element('category', element('post', $view)))); ?>] <?php } ?>
        <?php echo html_escape(element('post_title', element('post', $view))); ?>
    </h3> -->
    

    <?php /*if (element('extra_content', $view)) { ?>
        <div class="table-box">
            <table class="table-body">
                <tbody>
                <?php foreach (element('extra_content', $view) as $key => $value) { ?>
                    <tr>
                        <th class="px150"><?php echo html_escape(element('display_name', $value)); ?></th>
                        <td><?php echo nl2br(html_escape(element('output', $value))); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>몰
    <?php } */?>
   


    
    <!-- <section class="de_title02">
        <h2>
            자유게시판
            <span>자신의 의견을 게시하고 의견을 공유 하는 공간입니다.</span>
        </h2>
    </section> -->
    <!-- secretvt 자유게시판란광고 -->

    <section class="notice_title">
        <div>
        <?php echo element('post_title', element('post',$view)) ;

        if (element('use_post_secret', element('board', $view)) && element('is_admin', $view)) {
                    if (element('post_secret', element('post', $view)) ) {
                ?>  <span  style="cursor:pointer;" onClick="post_action('post_secret', '<?php echo element('post_id', element('post', $view)); ?>', '0');"><i class="fa fa-lock"></i></span>
                    
                <?php } else { ?>
                    <span  style="cursor:pointer;" onClick="post_action('post_secret', '<?php echo element('post_id', element('post', $view)); ?>', '1');"><i class="fa fa-unlock"></i></span>
                    
                <?php
                    }
                }

        ?>  

        </div>
    </section>

    <section class="title03 group" style="border-bottom:0;">
        
        <p><?php echo element('display_name', element('post', $view)); ?> | 작성일 : <?php echo element('display_datetime', element('post', $view)); ?> | 조회수 : <?php echo element('post_hit', element('post', $view)); ?></p>
    </section>
    
    <section class="content">
        <?php
    if (element('use_sns_button', $view)) {
        $this->managelayout->add_js(base_url('assets/js/sns.js'));
        if ($this->cbconfig->item('kakao_apikey')) {
            $this->managelayout->add_js('https://developers.kakao.com/sdk/js/kakao.min.js');
    ?>
        <script type="text/javascript">Kakao.init('<?php echo $this->cbconfig->item('kakao_apikey'); ?>');</script>
    <?php } ?>
        <div class="sns_button">
            <a href="javascript:;" onClick="sendSns('facebook', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 페이스북으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_facebook.png" width="22" height="22" alt="이 글을 페이스북으로 퍼가기" title="이 글을 페이스북으로 퍼가기" /></a>
            <a href="javascript:;" onClick="sendSns('twitter', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 트위터로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_twitter.png" width="22" height="22" alt="이 글을 트위터로 퍼가기" title="이 글을 트위터로 퍼가기" /></a>
            <?php if ($this->cbconfig->item('kakao_apikey')) { ?>
                <a href="javascript:;" onClick="kakaolink_send('<?php echo html_escape(element('post_title', element('post', $view)));?>', '<?php echo element('short_url', $view); ?>');" title="이 글을 카카오톡으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_kakaotalk.png" width="22" height="22" alt="이 글을 카카오톡으로 퍼가기" title="이 글을 카카오톡으로 퍼가기" /></a>
            <?php } ?>
            <a href="javascript:;" onClick="sendSns('kakaostory', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 카카오스토리로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_kakaostory.png" width="22" height="22" alt="이 글을 카카오스토리로 퍼가기" title="이 글을 카카오스토리로 퍼가기" /></a>
            <a href="javascript:;" onClick="sendSns('band', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 밴드로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_band.png" width="22" height="22" alt="이 글을 밴드로 퍼가기" title="이 글을 밴드로 퍼가기" /></a>
        </div>
    <?php } ?>
       <!-- <ul>
                <li><a href="<?php echo element('list_url', $view); ?>">목록보기</a></li>
                <li><a href="<?php echo base_url('document/map/'.element('post_id', element('post', $view))); ?>">위치확인</a></li>
                <li><a href="">문자전송</a></li>
                <li><a href="">전화하기</a></li>
            </ul> -->
        <div class="contents-view">
            <div class="contents-view-img">
                <?php
                if (element('file_image', $view)) {
                    foreach (element('file_image', $view) as $key => $value) {
                ?>
                    <img src="<?php echo element('thumb_image_url', $value); ?>" alt="<?php echo html_escape(element('pfi_originname', $value)); ?>" title="<?php echo html_escape(element('pfi_originname', $value)); ?>" class="view_full_image" data-origin-image-url="<?php echo element('origin_image_url', $value); ?>" style="max-width:100%;" />
                <?php
                    }
                }
                ?>
            </div>

            <!-- 본문 내용 시작 -->
            <div class="post-content"><?php echo element('content', element('post', $view)); ?></div>
            <!-- 본문 내용 끝 -->
        </div>

         
    </section>

      
    


    

    <div class="clearfix"></div>
    
    <div class="border_button cont_tab mg10">
        <div class="pull-left">
            
                <a href="<?php echo element('list_url', $view); ?>" class="btn btn-danger btn-sm">목 록</a>
            <?php if (element('search_list_url', $view)) { ?>
                    <a href="<?php echo element('search_list_url', $view); ?>" class="btn btn-info btn-sm">검색목록</a>
            <?php } ?>
            <?php if (element('prev_post', $view)) { ?>
                <a href="<?php echo element('url', element('prev_post', $view)); ?>" class="btn btn-success btn-sm"><i class="fa fa-caret-left"></i> 이전 글</a>
            <?php } ?>
            <?php if (element('next_post', $view)) { ?>
                <a href="<?php echo element('url', element('next_post', $view)); ?>" class="btn btn-success btn-sm">다음글 <i class="fa fa-caret-right"></i></a>
            <?php } ?>
        </div>
        <?php if (element('write_url', $view)) { ?>
            <div class="pull-right">
            <?php    if (element('delete_url', $view)) { ?>
                <a href="<?php echo element('delete_url', $view); ?>" class="btn btn-silver btn-sm btn-one-delete">삭제</a>
            <?php } ?>
                <?php if (element('modify_url', $view)) { ?>
                <a href="<?php echo element('modify_url', $view); ?>" class="btn btn-info btn-sm">수정</a>
            <?php } ?>
                <a href="<?php echo element('write_url', $view); ?>" class="btn btn-success btn-sm">글쓰기</a>
            </div>
        <?php } ?>
    </div>
    
    <?php
    

        if (element('show_textarea', element('comment', $view))) { ?>
            <section class="reply_write ">
                <?php   $this->load->view(element('view_skin_path', $layout) . '/comment_write'); ?>
                <section id="viewcomment" class="mb0" style="display:block"></section>
            </section>
            
        <?php
        }
    
    ?>
 
    





</div>

<?php echo element('footercontent', element('board', $view)); ?>

<?php if (element('target_blank', element('board', $view))) { ?>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
    $("#post-content a[href^='http']").attr('target', '_blank');
});
//]]>
</script>
<?php } ?>

<script type="text/javascript">
//<![CDATA[
var client = new ZeroClipboard($('.copy_post_url'));
client.on('ready', function( readyEvent ) {
    client.on('aftercopy', function( event ) {
        alert('게시글 주소가 복사되었습니다. \'Ctrl+V\'를 눌러 붙여넣기 해주세요.');
    });
});
//]]>
</script>
<?php
if (element('highlight_keyword', $view)) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#post-content').highlight([<?php echo element('highlight_keyword', $view);?>]);
//]]>
</script>
<?php } ?>

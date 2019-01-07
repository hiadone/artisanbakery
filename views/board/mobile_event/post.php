<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_css(base_url('/assets/css/swiper.min.css')); ?>
<?php	$this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); ?>
<?php $this->managelayout->add_js(base_url('/assets/js/swiper.min.js')); ?>

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
<?php echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>'); ?>
<section class="goods_detail">
    <div class="goods_tit">
        
        <?php if (element('category', element('post', $view))) { ?><p class="goods_cate"><?php echo html_escape(element('bca_value', element('category', element('post', $view)))); ?></p> <?php } ?>
        <h4 class="item_name"><?php echo html_escape(element('post_title', element('post', $view))); ?></h4>
        <h4 class="item_subtit"><?php echo html_escape(element('post_sub_title', element('post', $view))); ?></h4>
		<p class="event_date"><?php if(element('value_1',element('extravars', element('post', $view)))) echo element('value_1',element('extravars', element('post', $view))); ?> ~ <?php if(element('value_2',element('extravars', element('post', $view)))) echo element('value_2',element('extravars', element('post', $view))); ?></p>
        


       
	</div>
	


	<div class="contents-view goods_post">
		<!-- <div class="contents-view-img">
			<?php
			if (element('file_image', $view)) {
				foreach (element('file_image', $view) as $key => $value) {
			?>
				<img src="<?php echo element('thumb_image_url', $value); ?>" alt="<?php echo html_escape(element('pfi_originname', $value)); ?>" title="<?php echo html_escape(element('pfi_originname', $value)); ?>" class="view_full_image" data-origin-image-url="<?php echo element('origin_image_url', $value); ?>" style="max-width:100%;" />
			<?php
				}
			}
			?>
		</div> -->

		<!-- 본문 내용 시작 -->
		<div id="post-content goods_txt"><?php echo element('content', element('post', $view)); ?></div>
		<!-- 본문 내용 끝 -->
	</div>
	
	
</section>



<div class="clearfix"></div>

<div class="border_button  cont_tab mg10">
        <div class="pull-left" >
            
                <a href="<?php echo element('list_url', $view); ?>" class="btn btn-info btn-sm">목 록</a>
            <?php if (element('search_list_url', $view)) { ?>
                    <a href="<?php echo element('search_list_url', $view); ?>" class="btn btn-info btn-sm">검색목록</a>
            <?php } ?>
            <?php if (element('prev_post', $view)) { ?>
                <a href="<?php echo element('url', element('prev_post', $view)); ?>" class="btn btn-success btn-sm">◀이전 글</a>
            <?php } ?>
            <?php if (element('next_post', $view)) { ?>
                <a href="<?php echo element('url', element('next_post', $view)); ?>" class="btn btn-success btn-sm">다음 글▶</a>
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


    var swiper = new Swiper('.gallery_list02 .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 10,
      freeMode: true,
      pagination: {
        el: '.gallery_list02 .swiper-pagination',
        clickable: true,
      },
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

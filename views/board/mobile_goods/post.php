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

        <p class="item_kcal"><span class="price_num">00,000</span>&#32;<span class="dong">₫</span></p>


        <?php
        if (element('use_sns_button', $view)) {
            $this->managelayout->add_js(base_url('assets/js/sns.js'));
        ?>
        
        
            <div class="btn_box">
                <button class="btn_share" id="btn-share"><i class="fa fa-share-alt"></i></button>
                <ul class="btn_sns_ul">
                <li class="btn_sns"><a href="javascript:;" onClick="sendSns('facebook', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 페이스북으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_facebook.png"  alt="share on facebook" title="share on facebook" /></a></li>
                
                <li class="btn_sns"><a href="javascript:;" onClick="sendSns('band', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 밴드로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_band.png"  alt="share on band" title="share on band" /></a></li>
                </ul>
            </div>
            <script>
					$(function(){
						//sns 공유
						$('#btn-share').on('click',function(){
							$(this).siblings('.btn_sns_ul').slideToggle(400,function(){
								$('.btn_sns_ul').stop(true,true);
							});
						
						});
					
					});
				</script>
        <?php } ?>
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
	
	<section class="nutrient">
	<?php if (element('extra_content', $view)) { ?>
		
			<h4 class="title07">영양성분표</h4>
			<div class="table-box table_nutrient">
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
			</div>
			<div class="btn_box">
				<button class="btn-black btn_infoshow" value="#infoOrigin">원산지 정보</button>
				<button class="btn-black btn_infoshow" value="#infoAllergy">알레르기 유발 성분</button>

			</div>
			<div class="black_back">
				<section class="info_ingredients" id="infoOrigin">
					<h4 class="title08">원산지 정보</h4>
					<div class="ingredients_box gallery_list03">
						<ul class="gallery_list_ul">
							<li class="gallery_list_li">
								<div class="list_img"><img src="http://m.subway.co.kr/images/menu/icon_country_origin01.png" alt="ingredients" class="icon"><span class="list_img_tit">ingredients</span></div>
								<div class="list_txt">
									<div>
										<p class=""><b>food</b>: origin</p>
										<p class=""><b>food</b>: origin</p>
									</div>
								</div>
							</li>
							<li class="gallery_list_li">
								<div class="list_img"><img src="http://placehold.it/80x80/" alt="ingredients" class="icon"><span class="list_img_tit">ingredients</span></div>
								<div class="list_txt">
									<div>
										<p class=""><b>food</b>: origin</p>
										<p class=""><b>food</b>: origin</p>
									</div>
								</div>
							</li>
							<li class="gallery_list_li">
								<div class="list_img"><img src="http://placehold.it/80x80/" alt="ingredients" class="icon"><span class="list_img_tit">ingredients</span></div>
								<div class="list_txt">
									<div>
										<p class=""><b>food</b>: origin</p>
										<p class=""><b>food</b>: origin</p>
									</div>
								</div>
							</li>
							<li class="gallery_list_li">
								<div class="list_img"><img src="http://placehold.it/80x80/" alt="ingredients" class="icon"><span class="list_img_tit">ingredients</span></div>
								<div class="list_txt">
									<div>
										<p class=""><b>food</b>: origin</p>
										<p class=""><b>food</b>: origin</p>
									</div>
								</div>
							</li>
							<li class="gallery_list_li">
								<div class="list_img"><img src="http://placehold.it/80x80/" alt="ingredients" class="icon"><span class="list_img_tit">ingredients</span></div>
								<div class="list_txt">
									<div>
										<p class=""><b>food</b>: origin</p>
										<p class=""><b>food</b>: origin</p>
									</div>
								</div>
							</li>
						</ul>


					</div>
					<button class="btn btn_close"><i class="fa fa-close"></i><span class="blind">close button</span></button>
				</section>


				<!-- 알레르기 유발성분 -->

				<section class="info_ingredients" id="infoAllergy">
					<h4 class="title08">알레르기 유발성분</h4>
					<div class="ingredients_box">
						<div class="info_ingredients_txt">
							Nullam mi odio, tincidunt in diam vitae, rutrum condimentum diam. Curabitur et neque quis lectus vulputate porttitor. Sed id varius odio. Proin vel leo purus. Nam imperdiet a nisi et venenatis. Integer at sem id metus dapibus ultrices in ut est. Phasellus id orci justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
						</div>

						<div class="select_cate_box">
							<select class="input select_cate" onchange="">
								<option value="">Bread</option>
								<option value="">Cake</option>
								<option value="">Cookies</option>
								<option value="">Drink</option>
							</select>

						</div>
						<div class="table-box table_nutrient">
							<table class="table-body">
								<tbody>
									<tr>
										<th class="px150">food</th>
										<td>stuff stuff stuff</td>
									</tr>
									<tr>
										<th class="px150">food</th>
										<td>stuff stuff stuff</td>
									</tr>
									<tr>
										<th class="px150">food</th>
										<td>stuff stuff stuff</td>
									</tr>
									<tr>
										<th class="px150">food</th>
										<td>stuff stuff stuff</td>
									</tr>
									<tr>
										<th class="px150">food</th>
										<td>stuff stuff stuff</td>
									</tr>
									<tr>
										<th class="px150">food</th>
										<td>stuff stuff stuff</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<button class="btn btn_close"><i class="fa fa-close"></i><span class="blind">close button</span></button>
				</section>

				
			</div>
			<!-- 원산지 정보 -->
			<script>
				$(function() {
					$('.btn_infoshow').on('click', function() {
						var openSect = $(this).attr('value');
						$('.black_back').show();
						$(openSect).show().animate({
							top: '0'
						}, 400);

					});
					$('.btn_close').on('click', function() {
						$(this).closest('.info_ingredients').animate({
							top: '100vh'
						}, 400, function() {
							$(this).hide();
							$('.black_back').hide();
						});

					});

				});
				//
			</script>
		
	<?php } ?>
	</section>
</section>

<section class="gallery_list05">
	<h4 class="title09"><strong class="tit">Artisan</strong><span class="sub_tit">Artisan 의 자부심</span></h4>
	<div class="swiper-container">
		<ul class="swiper-wrapper gallery_list_ul">
			<li class="swiper-slide gallery_list_li">
				<div class="img_box">
					<img src="/assets/images/artisan01.jpg" alt="Phasellus varius dolor vel elit ornare iaculis." class="list_img">
				</div>
				<div class="list_txt">
					<h5 class="list_tit">Phasellus varius dolor <br>vel elit ornare iaculis.</h5>
					<p class="sub_txt">
						Nunc vestibulum justo vel tellus feugiat, suscipit interdum nisl vestibulum. 
					</p>
				</div>
			</li>
			<li class="swiper-slide gallery_list_li">
				<div class="img_box">
					<img src="/assets/images/artisan02.jpg" alt="Suspendisse non elit ut velit bibendum euismod." class="list_img">
				</div>
				<div class="list_txt">
					<h5 class="list_tit">Suspendisse non elit ut <br>velit bibendum euismod.</h5>
					<p class="sub_txt">
						Nullam nec lorem vel turpis aliquet imperdiet.Vestibulum at massa ornare molestie tristique ut nisi.
					</p>
				</div>
			</li>
			<li class="swiper-slide gallery_list_li">
				<div class="img_box">
					<img src="/assets/images/artisan03.jpg" alt="Nulla lacinia diam vitae blandit porta." class="list_img">
				</div>
				<div class="list_txt">
					<h5 class="list_tit">Nulla lacinia diam <br>vitae blandit porta.</h5>
					<p class="sub_txt">
						Praesent ac ante quis mauris porttitor vehicula.Vivamus bibendum eros id aliquam porta.
					</p>
				</div>
			</li>
		</ul>
		<!-- Add Pagination -->
		<div class="swiper-pagination pagination_yellow"></div>
	</div>
	
</section>
<script>
	var swiper = new Swiper('.gallery_list05 .swiper-container', {
	  autoHeight: true,
	  pagination: {
		el: '.gallery_list05 .swiper-pagination',
		clickable: true,
	  },
	});
  </script>

<div class="clearfix"></div>
<div class="border_button cont_tab mg10">
        
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


    if ( ! element('post_hide_comment', element('post', $view))) { ?>
        <section class="reply_write ">
            <?php   $this->load->view(element('view_skin_path', $layout) . '/comment_write'); ?>
            <section id="viewcomment" class="mb0" style="display:block"></section>
        </section>
        
    <?php
    }

?>

	
	
	


<div>
<?php 
$config = array(
		'skin' => 'mobile',
		'brd_key' => element('brd_key', element('board', $view)),
		'post_id' => element('post_id', element('post', $view)),
		'is_gallery' => 1,
		'cache_minute' => 1,
	);
echo $this->board->latest_goods($config);

?>
</div>

<a href="<?php echo element('list_url', $view); ?>" class="btn btn-info btn_more">전 체 목 록</a>



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

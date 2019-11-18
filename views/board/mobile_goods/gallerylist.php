<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_js(base_url('/assets/js/jquery.fade-in.min.js')); ?>
<?php echo element('headercontent', element('board', element('list', $view))); ?>



<div class="board">
	
	

	

	<?php
	$attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
	echo form_open('', $attributes);
	?>

	<?php if (element('is_admin', $view)) { ?>
		<div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
	<?php } ?>

	

	<div class="gallery_list01 table-image">
	<?php
	$i = 0;
	$open = false;
	$cols = element('gallery_cols', element('board', element('list', $view)));
	if (element('list', element('data', element('list', $view)))) {
		foreach (element('list', element('data', element('list', $view))) as $result) {
			if ($cols && $i % $cols === 0) {
				echo '<ul class="gallery_list_ul fade-in" >';
				$open = true;
			}
			$marginright = (($i+1)% $cols === 0) ? 0 : 2;
	?>
		<li class="gallery-box gallery_list_li " style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
			<?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>


			<div>
				<a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>"><div class="list_img"><img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class="goods_thumbnail img-responsive"   /></div></a>
			</div>
            
			<p class="list_txt item_name ">
				<a href="<?php echo element('post_url', $result); ?>" style="
					<?php
					if (element('title_color', $result)) {
						echo 'color:' . element('title_color', $result) . ';';
					}
					if (element('title_font', $result)) {
						echo 'font-family:' . element('title_font', $result) . ';';
					}
					if (element('title_bold', $result)) {
						echo 'font-weight:bold;';
					}
					if (element('post_id', element('post', $view)) === element('post_id', $result)) {
						echo 'font-weight:bold;';
					}
					?>" title="<?php echo html_escape(element('title', $result)); ?>" class="item_name"><?php echo html_escape(element('title', $result)); ?>
				</a>
			</p>
				<!-- <p class="list_txt item_postinfo">
					<a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('post_sub_title', $result)); ?>" >
					<?php echo element('post_sub_title', $result); ?>
                    </a>
					<strong class="item_price ">
						<span class="price_num">00,000</span>&#32;<span class="dong">₫</span>
					</strong>
					
				</p> -->

				<!-- tag tag_new tag_hot tag_event -->

				<?php if (element('is_new', $result)) { ?>
				<div class="tag_box">
					<span class="label label-warning tag_new">New</span>
				</div>
				<?php } ?>
				
				<!--  -->
			</li>
		<?php
				$i++;
				if ($cols && $i > 0 && $i % $cols === 0 && $open) {
					echo '</ul>';
					$open = false;
				}
			}
		}
		if ($open) {
			echo '</ul>';
			$open = false;
		}
		?>
		</div>
	<?php echo form_close(); ?>

	
	<nav><?php echo element('paging', element('list', $view)); ?></nav>
    <div class="table-bottom ">
        <div class="pull-left mr10 ml3per">
            <!-- <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">목록</a> -->
            <?php if (element('search_list_url', element('list', $view))) { ?>
                <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-success btn-sm">전체목록</a>
            <?php } ?>
        </div>
        <?php if (element('is_admin', $view)) { ?>
            
            <div class="pull-left ">
                <a onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');" class="btn btn-danger btn-sm">선택삭제</a>

                <!-- <button type="button" class="btn btn-default btn-sm admin-manage-list"><i class="fa fa-cog big-fa"></i>관리</button>
                <div class="btn-admin-manage-layer admin-manage-layer-list">
                    <?php if (element('is_admin', $view) === 'super') { ?>
                        <div class="item" onClick="document.location.href='<?php echo admin_url('board/boards/write/' . element('brd_id', element('board', element('list', $view)))); ?>';"><i class="fa fa-cog"></i> 게시판설정</div>
                        <div class="item" onClick="post_multi_copy('copy');"><i class="fa fa-files-o"></i> 복사하기</div>
                        <div class="item" onClick="post_multi_copy('move');"><i class="fa fa-arrow-right"></i> 이동하기</div>
                        <div class="item" onClick="post_multi_change_category();"><i class="fa fa-tags"></i> 카테고리변경</div>
                    <?php } ?>
                    <div class="item" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제하기</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '0', '선택하신 글들을 공지를 내리시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지내림</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '1', '선택하신 글들을 공지로 등록 하시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지올림</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
                    <div class="item" onClick="post_multi_action('post_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
                </div> -->
            </div>
        <?php } ?>
        <?php if (element('write_url', element('list', $view))) { ?>
            <div class="pull-right ">
                <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
            </div>
        <?php } ?>
    </div>
</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<?php
if (element('highlight_keyword', element('list', $view))) {
	$this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>


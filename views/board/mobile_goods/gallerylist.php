<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>



<div class="board">
	
	

	

	<?php
	$attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
	echo form_open('', $attributes);
	?>

	<?php if (element('is_admin', $view)) { ?>
		<div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
	<?php } ?>

	

	<div class="gallery_list01">
	<?php
	$i = 0;
	$open = false;
	$cols = element('gallery_cols', element('board', element('list', $view)));
	if (element('list', element('data', element('list', $view)))) {
		foreach (element('list', element('data', element('list', $view))) as $result) {
			if ($cols && $i % $cols === 0) {
				echo '<ul class="gallery_list_ul">';
				$open = true;
			}
			$marginright = (($i+1)% $cols === 0) ? 0 : 2;
	?>
		<li class="gallery-box gallery_list_li" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
			<?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
			<div>
				<a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>"><div class="list_img"><img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class="thumbnail img-responsive"  /></div></a>
			</div>
			<p class="list_txt item_name mb0">
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
				<p class="list_txt item_postinfo">
					<a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('post_sub_title', $result)); ?>" >
					<?php echo element('post_sub_title', $result); ?>
					<strong class="item_price mt10">
						<span class="price_num">00,000</span>&#32;<span class="dong">₫</span>
					</strong>
					</a>
				</p>

				<!-- tag tag_new tag_hot tag_event -->

				<?php if (element('is_new', $result)) { ?>
				<div class="tag_box">
					<span class="tag tag_new">New</span>
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

	<div class="border_button">
		<div class="pull-left mr10">

			<?php if (element('search_list_url', element('list', $view))) { ?>
				<a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전체목록</a>
			<?php } ?>
		</div>
		
		<?php if (element('write_url', element('list', $view))) { ?>
			<div class="pull-right">
				<a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
			</div>
		<?php } ?>
	</div>
	<nav><?php echo element('paging', element('list', $view)); ?></nav>
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

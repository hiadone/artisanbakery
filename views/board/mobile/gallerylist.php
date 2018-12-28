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

	<div class=" gallery_list01">
	<?php
	$i = 0;
	$open = false;
	$cols = element('gallery_cols', element('board', element('list', $view)));
	if (element('list', element('data', element('list', $view)))) {
		foreach (element('list', element('data', element('list', $view))) as $result) {
			if ($cols && $i % $cols === 0) {
				echo '<ul class="mt20">';
				$open = true;
			}
			$marginright = (($i+1)% $cols === 0) ? 0 : 2;
	?>
		<li class="gallery-box gallery_list_li" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
			<?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
			<span class="label label-default"><?php echo element('num', $result); ?></span>
			<?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
			<?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
			<?php if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
			<div class="list_img">
				<a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>"><img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class="thumbnail img-responsive"/></a>
			</div>
			<p class="list_txt">
				<?php if (element('post_reply', $result)) { ?><span class="label label-primary">Re</span><?php } ?>
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
						?>
					" title="<?php echo html_escape(element('title', $result)); ?>" class="item_name"><?php echo html_escape(element('title', $result)); ?></a>
				</p>
				<p class="list_txt item_postinfo">
					<?php echo element('display_name', $result); ?>
					<?php //echo element('display_datetime', $result); ?>
					<?php if (element('is_hot', $result)) { ?><span class="label label-danger">Hot</span><?php } ?>
					<?php if (element('is_new', $result)) { ?><span class="label label-warning">New</span><?php } ?>
					<?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
					<?php if (element('post_comment_count', $result)) { ?><span class="comment-count"><i class="fa fa-comments"></i><?php echo element('post_comment_count', $result); ?></span><?php } ?>
					<span class="hit-count"><i class="fa fa-eye"></i> <?php echo number_format(element('post_hit', $result)); ?></span>
				</p>
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

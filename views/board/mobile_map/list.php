<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="board">
<div class="page_top01">
	<h3 class="title06"><?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?></h3>

</div>
	<div class="table-top">

        
        <div >
            <form class="navbar-form navbar-right pull-right" action="<?php echo current_full_url() ?>" onSubmit="return postSearch(this);">
                <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                <input type="hidden" name="sfield" value="post_title" />
                <div class="form-group">
                    
                    <input type="text" class="input px200 mr10" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
           
            
        
        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        // function toggleSearchbox() {
        //     $('.searchbox').show();
        //     $('.searchbuttonbox').hide();
        // }
        <?php

            // if ($this->input->get('skeyword')) {
            //     echo 'toggleSearchbox();';
            // }
        ?>
        $(document).on('click', '.btn-point-info', function() {
            $('.point-info-content').toggle();
        });
        //]]>
        </script>
    </div>


	<?php
	if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
		$category = element('category', element('board', element('list', $view)));
	?>
		<ul class="nav nav-tabs clearfix">
			<li role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=">전체</a></li>
			<?php
			if (element(0, $category)) {
				foreach (element(0, $category) as $ckey => $cval) {
			?>
				<li role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>"><?php echo html_escape(element('bca_value', $cval)); ?></a></li>
			<?php
				}
			}
			?>
		</ul>
	<?php } ?>

	<?php
	$attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
	echo form_open('', $attributes);
	?>
		<table class="table post_list">
			<thead>
				<tr>
					<?php if (element('is_admin', $view)) { ?><th><input onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /></th><?php } ?>
					<th class="table_num">번호</th>
					<th class="table_tit">제목</th>
					<th class="table_user">글쓴이</th>
					<th class="table_date">날짜</th>
					<th class="table_views">조회수</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (element('notice_list', element('list', $view))) {
				foreach (element('notice_list', element('list', $view)) as $result) {
			?>
				<tr>
					<?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
					<td><span class="label label-primary">공지</span></td>
					<td>
						<?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
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
						" title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
						<?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
						<?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
						<?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
						<?php if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
						<?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
					<td><?php echo element('display_name', $result); ?></td>
					<td><?php echo element('display_datetime', $result); ?></td>
					<td><?php echo number_format(element('post_hit', $result)); ?></td>
				</tr>
			<?php
				}
			}
			if (element('list', element('data', element('list', $view)))) {
				foreach (element('list', element('data', element('list', $view))) as $result) {
			?>
				<tr>
					<?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
					<td class="table_num"><?php echo element('num', $result); ?></td>
					<td class="table_tit">
						<?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
						<?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
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
						" title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
						<?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
						<?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
						<?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
						<?php if (element('is_hot', $result)) { ?><span class="label label-danger">Hot</span><?php } ?>
						<?php if (element('is_new', $result)) { ?><span class="label label-warning">New</span><?php } ?>
						<?php if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
						<?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
					<td class="table_user"><?php echo element('display_name', $result); ?></td>
					<td class="table_date"><?php echo element('display_datetime', $result); ?></td>
					<td class="table_views"><?php echo number_format(element('post_hit', $result)); ?></td>
				</tr>
			<?php
				}
			}
			if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
			?>
				<tr>
					<td colspan="6" class="nopost">게시물이 없습니다</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>

	<div class="table-bottom mt20 post_btn_box">
		<div class="pull-left mr20">

			<?php if (element('search_list_url', element('list', $view))) { ?>
				<a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전체목록</a>
			<?php } ?>
		</div>
		<?php if (element('is_admin', $view)) { ?>
			<div class="pull-left">
				<button type="button" class="btn btn-default btn-sm admin-manage-list"><i class="fa fa-cog big-fa"></i>관리</button>
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
				</div>
			</div>
		<?php } ?>
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

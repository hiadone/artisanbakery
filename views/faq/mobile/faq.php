<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<section class="sect_faq">
<div class="page_top01">
<h3 class="title06"><?php echo element('fgr_title', element('faqgroup', $view)); ?></h3>
</div>
<form class="search_box text-center mb20" action="<?php echo current_url(); ?>" onSubmit="return faqSearch(this)">
	<input type="text" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" class="input" placeholder="Search" />
	<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
</form>

<script type="text/javascript">
//<![CDATA[
function faqSearch(f) {
	var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
	if (skeyword.length < 2) {
		alert('2글자 이상으로 검색해 주세요');
		f.skeyword.focus();
		return false;
	}
	return true;
}
//]]>
</script>
<div class="table_wrap">
<?php
$i = 0;
if (element('list', element('data', $view))) {
	foreach (element('list', element('data', $view)) as $result) {
?>
	<div class="table-box">
		<div class="table-heading" id="heading_<?php echo $i; ?>" onclick="return faq_open(this);">
			<?php echo element('title', $result); ?>
		</div>
		<div class="table-answer answer" id="answer_<?php echo $i; ?>">
			<?php echo element('content', $result); ?>
		</div>
	</div>
<?php
		$i++;
	}
}
if ( ! element('list', element('data', $view))) {
?>
	<div class="table-answer nopost">내용이 없습니다</div>
<?php
}
?>
	<nav><?php echo element('paging', $view); ?></nav>
<?php
if ($this->member->is_admin() === 'super') {
?>
	<div class="text-center mt20">
		<a href="<?php echo admin_url('page/faq'); ?>?fgr_id=<?php echo element('fgr_id', element('faqgroup', $view)); ?>" class="btn btn-black btn-sm" target="_blank" title="FAQ 수정">FAQ 수정</a>
	</div>
<?php
}
?>
</div>
</section>
<script type="text/javascript">
//<![CDATA[
function faq_open(el)
{
	var $con = $(el).closest('.table-box').find('.answer');

	if ($con.is(':visible')) {
		$con.slideUp();
		$(el).removeClass('table_open');
	} else {
		//$('.answer:visible').css('display', 'none');
		$('.answer:visible').slideUp();
		$('.table-heading').removeClass('table_open');
		$con.slideDown();
		$(el).addClass('table_open');
	}
	return false;
}
//]]>
</script>

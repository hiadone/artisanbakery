


<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css?'.$this->cbconfig->item('browser_cache_version')); ?>
<?php echo element('headercontent', element('board', $view)); ?>
<?php 

$readonly='';
if ($this->member->is_member() === false) {
    // $readonly = 'readonly="readonly"';
}
?>

<div class="wrap02">

    

   
<?php if(element('brd_key',element('board', $view))!=='vtn_discount' || element('is_admin', $view) ) {?>
<section class="write_area">
    
    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>');
    echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>'); 
    $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onsubmit' => 'return submitContents(this)');
    echo form_open_multipart(current_full_url(), $attributes);
    ?>
        <input type="hidden" name="<?php echo element('primary_key', $view); ?>"    value="<?php echo element(element('primary_key', $view), element('post', $view)); ?>" />
        <div >
       
        
            <label for="post_title" class="write_label">제목</label>
            <input type="text" name="post_title" id="post_title" <?php echo $readonly ?> value="<?php echo element('reply', $view) && element('origin', $view) ? 'RE) '.set_value('post_title', element('post_title', element('origin', $view))) : set_value('post_title', element('post_title', element('post', $view))); ?>" placeholder="제목글을 작성해 주세요.리스트에 노출됩니다." onfocus="this.placeholder=''" onblur="this.placeholder='제목글을 작성해 주세요. 리스트에 노출됩니다.'" style="display:block;margin-bottom:5px;" />
            <?php if ($this->member->is_member() === false ) { ?>
            <input type="hidden" name="post_nickname"  value="손님" />
            <input type="hidden" name="post_email"  value="guest@secretvt.com" />
            <label for="post_password" class="write_label">비밀번호</label> 
<input type="password" name="post_password" id="post_password" value="" placeholder="비밀번호를 입력해 주세요" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호를 입력해 주세요.'" style="display:block;" autocomplete="new-password"/>
            
        <?php } ?>
        <?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>
            <div class="well well-sm" style="margin-bottom:15px;">
                현재 <strong><span id="char_count">0</span></strong> 글자이며,
                <?php if (element('post_min_length', element('board', $view))) { ?>
                    최소 <strong><?php echo number_format(element('post_min_length', element('board', $view))); ?></strong> 글자 이상
                <?php } if (element('post_max_length', element('board', $view))) { ?>
                    최대 <strong><?php echo number_format(element('post_max_length', element('board', $view))); ?></strong> 글자 이하
                <?php } ?>
                입력하실 수 있습니다.
            </div>
        <?php } ?>
        <div class="form-group ">
            <?php echo display_dhtml_editor('post_content', set_value('post_content', element('post_content', element('post', $view))), $classname = '"" placeholder="관련 문의글을 작성해 주세요." '.$readonly.'
    onfocus="this.placeholder=\'\'"
    onblur="this.placeholder=\'관련 문의글을 작성해 주세요. \n\'"', $is_dhtml_editor = element('use_dhtml', element('board', $view)), $editor_type = $this->cbconfig->item('post_editor_type')); ?>
        </div>
        <?php
        if (element('link_count', element('board', $view)) > 0) {
            $link_count = element('link_count', element('board', $view));
            for ($i = 0; $i < $link_count; $i++) {
                $link = html_escape(element('pln_url', element($i, element('link', $view))));
                $link_column = $link ? 'post_link_update[' . element('pln_id', element($i, element('link', $view))) . ']' : 'post_link[' . $i . ']';
        ?>
            <li>
                <span>링크 #<?php echo $i+1; ?></span>
                <input type="text" class="input per95" name="<?php echo $link_column; ?>" value="<?php echo set_value($link_column, $link); ?>" />
            </li>
        <?php
            }
        }
        if (element('use_upload', element('board', $view))) {
            $file_count = element('upload_file_count', element('board', $view));
            for ($i = 0; $i < $file_count; $i++) {
                $download_link = html_escape(element('download_link', element($i, element('file', $view))));
                $file_column = $download_link ? 'post_file_update[' . element('pfi_id', element($i, element('file', $view))) . ']' : 'post_file[' . $i . ']';
                $del_column = $download_link ? 'post_file_del[' . element('pfi_id', element($i, element('file', $view))) . ']' : '';
        ?>
            <li>
                <span>파일 #<?php echo $i+1; ?></span>
                <input type="file" class="input" name="<?php echo $file_column; ?>" />
                <?php if ($download_link) { ?>
                    <a href="<?php echo $download_link; ?>"><?php echo html_escape(element('pfi_originname', element($i, element('file', $view)))); ?></a>
                    <label for="<?php echo $del_column; ?>">
                        <input type="checkbox" name="<?php echo $del_column; ?>" id="<?php echo $del_column; ?>" value="1" <?php echo set_checkbox($del_column, '1'); ?> /> 삭제
                    </label>
                <?php } ?>
            </li>
        <?php
            }
        }
        ?>
        
            <div class="table-bottom text-center ">
                <?php if(element('post_id',element('post', $view))){ ?>
                <button type="submit" class="btn-success" style="width:45%">수정하기</button>
                <button type="button" class="btn-history-back btn-silver" style="width:45%">취소하기</button>
                <?php }elseif(element('reply', $view) && element('origin', $view)){ ?>
                <button type="submit" class="btn-success" style="width:45%">답변하기</button>
                <button type="button" class="btn-history-back btn-silver" style="width:45%">취소하기</button>
                <?php } else { ?>
                <button type="submit" class="btn-success">작 성 하 기</button>
                <?php } ?>
            </div>
        </div>
    <?php echo form_close(); ?>
    </section>
</div>
<?php } ?>
<?php echo element('footercontent', element('board', $view)); ?>


<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?php echo element('post_min_length', element('board', $view)) + 0; ?>); // 최소
var char_max = parseInt(<?php echo element('post_max_length', element('board', $view)) + 0; ?>); // 최대

<?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>

check_byte('post_content', 'char_count');
$(function() {
    $('#post_content').on('keyup', function() {
        check_byte('post_content', 'char_count');
    });
});
<?php } ?>
function submitContents(f) {
    if ($('#char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte('post_content', 'char_count'));
            if (char_min > 0 && char_min > cnt) {
                alert('내용은 ' + char_min + '글자 이상 쓰셔야 합니다.');
                $('#post_content').focus();
                return false;
            } else if (char_max > 0 && char_max < cnt) {
                alert('내용은 ' + char_max + '글자 이하로 쓰셔야 합니다.');
                $('#post_content').focus();
                return false;
            }
        }
    }
    var title = '';
    var content = '';
    $.ajax({
        url: cb_url + '/postact/filter_spam_keyword',
        type: 'POST',
        data: {
            title: f.post_title.value,
            content: f.post_content.value,
            csrf_test_name : cb_csrf_hash
        },
        dataType: 'json',
        async: false,
        cache: false,
        success: function(data) {
            title = data.title;
            content = data.content;
        }
    });
    if (title) {
        alert('제목에 금지단어(\'' + title + '\')가 포함되어있습니다');
        f.post_title.focus();
        return false;
    }
    if (content) {
        alert('내용에 금지단어(\'' + content + '\')가 포함되어있습니다');
        f.post_content.focus();
        return false;
    }
}
</script>

<?php
if (element('is_post_name', element('post', $view))) {
    if ($this->cbconfig->item('use_recaptcha')) {
        $this->managelayout->add_js(base_url('assets/js/recaptcha.js'));
    } else {
        $this->managelayout->add_js(base_url('assets/js/captcha.js'));
    }
}
?>
<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fwrite').validate({
        rules: {
            post_title: {required :true, minlength:2, maxlength:60},
            post_content : {<?php echo (element('use_dhtml', element('board', $view))) ? 'required_' . $this->cbconfig->item('post_editor_type') : 'required'; ?> : true }
<?php if (element('is_post_name', element('post', $view))) { ?>
            , post_nickname: {required :true, minlength:2, maxlength:20}
            , post_email: {required :true, email:true}
<?php } ?>
<?php if ($this->member->is_member() === false) { ?>
            , post_password: {required :true, minlength:4, maxlength:100}
<?php } ?>
<?php if (element('use_category', element('board', $view))) { ?>
            , post_category : {required: true}
<?php } ?>
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});
<?php if ($this->member->is_member() === false) { ?>
    // $("#post_title").bind('click',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
    // $("#post_title").bind('focus',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
    // $("#post_content").bind('click',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
    // $("#post_content").bind('focus',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
<?php } ?>

//]]>
</script>

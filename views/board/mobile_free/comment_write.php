<div class="alert alert-auto-close alert-dismissible alert-comment-message" style="display:none;"><span class="alert-comment-message-content"></span></div>
<?php
if ( ! element('post_hide_comment', element('post', $view)) && element('is_admin', $view)) {
?>
    <div class="chk_comment_all_wrapper"><label for="chk_comment_all"><input id="chk_comment_all" onclick="all_commentlist_checked(this.checked);" type="checkbox" /> 코멘트 전체선택</label></div>
    
<?php
}
if (element('can_comment_write', element('comment', $view)) OR element('show_textarea', element('comment', $view))) {
?>
    <div id="comment_write_box">
        <div class="well  pd0">
            
            <?php
            $attributes = array('name' => 'fcomment', 'id' => 'fcomment');
            echo form_open('', $attributes);
            ?>
                <input type="hidden" name="mode" id="mode" value="c" />
                <input type="hidden" name="post_id" value="<?php echo element('post_id', element('post', $view)); ?>" />
                <input type="hidden" name="cmt_id" value="" id="cmt_id" />
                <input type="hidden" name="cmt_page" value="" id="cmt_page" />
                
                <textarea class="input commenttextarea" name="cmt_content" id="cmt_content" rows="5" accesskey="c" <?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'onClick="alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} ?>><?php echo set_value('cmt_content', element('cmt_content', element('comment', $view))); ?></textarea>
                <?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>
                    <div>
                        현재 <strong><span id="char_count">0</span></strong> 글자이며,
                        <?php if (element('comment_min_length', element('board', $view))) { ?>
                            최소 <strong><?php echo number_format(element('comment_min_length', element('board', $view))); ?></strong> 글자 이상
                        <?php }
                        if (element('comment_max_length', element('board', $view))) { ?>
                            최대 <strong><?php echo number_format(element('comment_max_length', element('board', $view))); ?></strong> 글자 이하
                        <?php } ?>
                        입력하실 수 있습니다.
                    </div>
                <?php } ?>
                <div class="comment_write_button_area mt0 mb20">
                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-danger btn-sm" id="cmt_btn_submit" onClick="<?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} else { ?>add_comment(this.form, '<?php echo element('post_id', element('post', $view)); ?>');<?php } ?> ">댓글등록</button>
                    </div>
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <?php if (element('can_comment_secret', element('comment', $view))) { ?>
                            <div class="checkbox pull-left mr10">
                                <label for="cmt_secret">
                                    <input type="checkbox" name="cmt_secret" id="cmt_secret" value="1" <?php echo set_checkbox('cmt_secret', '1', (element('cmt_secret', element('comment', $view)) ? true : false)); ?> /> 비밀글
                                </label>
                            </div>
                        <?php } ?>
                        <?php if (element('use_emoticon', element('comment', $view))) { ?>
                            <button type="button" class="btn btn-default btn-sm" title="이모티콘" onclick="window.open('<?php echo site_url('helptool/emoticon?id=cmt_content'); ?>', 'emoticon', 'width=600,height=400,scrollbars=yes')"><i class="fa fa-smile-o fa-lg"></i></button>
                        <?php } ?>
                        <?php if (element('use_specialchars', element('comment', $view))) { ?>
                            <button type="button" class="btn btn-default btn-sm" title="특수문자" onclick="window.open('<?php echo site_url('helptool/specialchars?id=cmt_content'); ?>', 'specialchars', 'width=490,height=245,scrollbars=yes')"><i class="fa fa-star-o fa-lg"></i></button>
                        <?php } ?>
                       
                    
                    </div>
                </div>
                
            <?php echo form_close(); ?>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?php echo (int) element('comment_min_length', element('board', $view)); ?>); // 최소
var char_max = parseInt(<?php echo (int) element('comment_max_length', element('board', $view)); ?>); // 최대

<?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>

check_byte('cmt_content', 'char_count');
$(function() {
    $(document).on('keyup', '#cmt_content', function() {
        check_byte('cmt_content', 'char_count');
    });
});
<?php } ?>
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/comment.js'); ?>"></script>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function($) {
    view_comment('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', '', '');
});
//]]>
</script>

<?php if (element('is_comment_name', element('comment', $view))) { ?>
    <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/recaptcha.js'); ?>"></script>
    <?php } else { ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/captcha.js'); ?>"></script>
    <?php } ?>
<?php } ?>
<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fcomment').validate({
        rules: {
<?php if (element('is_comment_name', element('comment', $view))) { ?>
            cmt_nickname: {required :true, minlength:2, maxlength:20},
            cmt_password: {required :true, minlength:<?php echo element('password_length', element('comment', $view)); ?>},
<?php if ($this->cbconfig->item('use_recaptcha')) { ?>
            recaptcha : {recaptchaKey:true},
<?php } else { ?>
            captcha_key : {required: true, captchaKey:true},
<?php } ?>
<?php } ?>
            cmt_content: {required :true},
            mode : {required : true}
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});
//]]>
</script>

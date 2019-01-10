<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/boyoon.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/page.css'); ?>" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Sans" >
<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css" />
<?php echo $this->managelayout->display_css(); ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var cb_url = "<?php echo trim(site_url(), '/'); ?>";
var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
var cb_charset = "<?php echo config_item('charset'); ?>";
var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
var is_admin = "<?php echo $this->member->is_admin(); ?>";
var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.hoverIntent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobile.sidemenu.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
<div class="wrapper">
	<!-- header start -->
	<!-- nav start -->
	<header class="header navbar">
		<div class="container">
			<h1 class="logo">
				<a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><img src="<?php echo base_url('assets/images/h_logo.png'); ?>" alt="Artisan bakery"></a>
			</h1>
			<div class="h_btn m_nav pull-right" >
				<a href="javascript:;" id="btn_side"><img src="<?php echo base_url('assets/images/h_icon_ham.svg'); ?>" alt="menu" title="menu" /></a>
			</div>
			<div class="h_btn m_mypg pull-left">
			<?php if ($this->member->is_member()) { ?>
			    
			    <a href="<?php echo site_url('mypage'); ?>" ><img src="<?php echo base_url('assets/images/h_icon_user.svg'); ?>" alt="My Page"  ></a>
			<?php } else { ?>
			    <a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" ><img src="<?php echo base_url('assets/images/h_icon_user.svg'); ?>" alt="로그인" ></a>
			    
			<?php } ?>
			</div>

		</div>
		
	</header>
	
	<!-- nav end -->
	<!-- header end -->
	
	<!-- main start -->
	<div class="main">

		<div class="container  wrap01">
		<?php

	    if (element('menu', $layout)) {
	        $select='';
	        $menu = element('menu', $layout);

	        if (element(element(0,element('active',$menu)), $menu)) {
	        	
	            $select = '<div class="page_top01">
	            				<h2 class="title06 ">'.element('men_name',element(element(1,element('active',$menu)),element(element(0,element('active',$menu)), $menu))).'</h2>
									<div class="page_top_menu">
									 	<ul class="page_top_ul">
							';
	            foreach (element(element(0,element('active',$menu)), $menu) as $mkey => $mval) {
	                
	                    $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
	                    $active='';
	                    
	                    if(element('men_id',$mval) === element(1,element('active',$menu))) {
	                        
	                        $active=' active' ; 
	                    }
	                    $select .= '<li class="page_top_li'.$active.'"><a href="' . $mlink . '" ' . element('men_custom', $mval);
	                    if (element('men_target', $mval)) {
	                        $select .= ' target="' . element('men_target', $mval) . '"';
	                    }
	                    $select .= ' >' . html_escape(element('men_name', $mval)) . '</a></li>';

	                    $select .= "\n";
	                
	            }
	            $select .= '</ul>
						</div>
					</div>';
				echo $select;
	        }
	        
	    }
	    

	 	?>
				<!-- 본문 시작 -->
				 <?php if (isset($yield))echo $yield; ?>
				<!-- 본문 끝 -->

		</div>
	</div>
	<!-- main end -->

	<!-- footer start -->
    <?php echo $this->managelayout->display_footer(); ?>
	<!-- footer end -->
</div>

<aside class="menu" id="side_menu">
	<div class="side_wr add_side_wr">
		<div id="isroll_wrap" class="side_inner_rel">
			<div class="side_inner_abs">
				<div class="side_menu_top">
					<div class="m_logo">
						<img src="<?php echo base_url('assets/images/logo_r_yellow.png'); ?>" alt="Artisan bakery logo">
					</div>
					<div class="m_login">
						<?php if ($this->member->is_member()) { ?>
							<span><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary" title="로그아웃"><i class="fa fa-sign-out"></i> LOGOUT</a></span>
							<span><a href="<?php echo site_url('mypage'); ?>" class="btn btn-primary" title="마이페이지"><i class="fa fa-user"></i> 마이페이지</a></span>
						<?php } else { ?>
							<span><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary" title="로그인"><i class="fa fa-sign-in"></i> LOGIN</a></span>
							<span><a href="<?php echo site_url('register'); ?>" class="btn btn-primary" title="회원가입"><i class="fa fa-user"></i> 회원가입</a></span>
						<?php } ?>
					</div>
				</div>
				
				<ul class="m_menu">
					<?php
					$menuhtml = '';
					if (element('menu', $layout)) {
						$menu = element('menu', $layout);
						if (element(0, $menu)) {
							foreach (element(0, $menu) as $mkey => $mval) {
								if (element(element('men_id', $mval), $menu)) {
									$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
									$menuhtml .= '<li class="dropdown">
									<a href="' . $mlink . '" ' . element('men_custom', $mval);
									if (element('men_target', $mval)) {
										$menuhtml .= ' target="' . element('men_target', $mval) . '"';
									}
									$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '" class="menu_category"><span class="icon_back"></span>' . html_escape(element('men_name', $mval)) . '</a><a href="#" style="width:25px;float:right;" class="subopen" data-menu-order="' . $mkey . '"><i class="fa fa-chevron-down"></i></a>
									<ul class="dropdown-menu drop-downorder-' . $mkey . '">';

									foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
										$menuhtml .= '<li><a href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
										if (element('men_target', $sval)) {
											$menuhtml .= ' target="' . element('men_target', $sval) . '"';
										}
										$menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
									}
									$menuhtml .= '</ul></li>';

								} else {
									$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
									$menuhtml .= '<li><a href="' . $mlink . '" ' . element('men_custom', $mval);
									if (element('men_target', $mval)) {
										$menuhtml .= ' target="' . element('men_target', $mval) . '"';
									}
									$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
								}
							}
						}
					}
					echo $menuhtml;
					?>
				</ul>
			</div>
		</div>
	</div>
</aside>

<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
	Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
	Cookies.set('device_view_type', 'mobile', { expires: 1 });
});

	$(function(){
		//page_top_menu 위치
		var titHeight = $('.page_top_menu').siblings('.title06').outerHeight();
		$('.page_top_menu').css('top',titHeight);
		//open list_menu
			$('.page_top01 .title06').on('click',function(){
				var $listmenu = $(this).siblings('.page_top_menu')
				$listmenu.slideToggle(400,function(){
					$listmenu.stop(true,true);
				});
			
			});
		
		
		//end
		});
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->

</body>
</html>

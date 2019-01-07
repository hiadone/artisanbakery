<?php $this->managelayout->add_css(base_url('/assets/css/swiper.min.css')); ?>
<?php $this->managelayout->add_js(base_url('/assets/js/swiper.min.js')); ?>

<section class="slide_bnr01 swiper-container">
	<h2 class="blind">slide banner</h2>
	<ul class="slide_bnr_ul swiper-wrapper">

		<?php echo banner('main_swiper_slide','','','<li class="slide_bnr_li swiper-slide">','</li>') ?>
		
	</ul>
	<!-- Add Pagination -->
	<div class="swiper-pagination pagination_yellow"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
</section>


	

	<?php 
	$config = array(
			'skin' => 'mobile',
			'brd_key' => 'b-a-1',
			'is_gallery' => 1,
			'cache_minute' => 1,
		);
	echo $this->board->latest_main($config);

	?>



	

	<?php 
	$config = array(
			'skin' => 'mobile',
			'brd_key' => 'b-a-2',
			'is_gallery' => 1,
			'cache_minute' => 1,
		);
	echo $this->board->latest_main($config);

	?>



	

	<?php 
	$config = array(
			'skin' => 'mobile',
			'brd_key' => 'b-a-3',
			'is_gallery' => 1,
			'cache_minute' => 1,
		);
	echo $this->board->latest_main($config);

	?>


<script>
	var swiper = new Swiper('.slide_bnr01', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.slide_bnr01 .swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.slide_bnr01 .swiper-button-next',
			prevEl: '.slide_bnr01 .swiper-button-prev',
		},
	});

	var swiper = new Swiper('.gallery_list06.b-a-1 .gallery_list06_container', {
	  slidesPerView: 1,
	  spaceBetween: 0,
	  loop: true,
	  pagination: {
		el: '.gallery_list06.b-a-1 .swiper-pagination',
		clickable: true,
	  },
	  navigation: {
		nextEl: '.gallery_list06.b-a-1 .swiper-button-next',
		prevEl: '.gallery_list06.b-a-1 .swiper-button-prev',
	  },
	});


	var swiper = new Swiper('.gallery_list06.b-a-2 .gallery_list06_container', {
	  slidesPerView: 1,
	  spaceBetween: 0,
	  loop: true,
	  pagination: {
		el: '.gallery_list06.b-a-2 .swiper-pagination',
		clickable: true,
	  },
	  navigation: {
		nextEl: '.gallery_list06.b-a-2 .swiper-button-next',
		prevEl: '.gallery_list06.b-a-2 .swiper-button-prev',
	  },
	});


	var swiper = new Swiper('.gallery_list06.b-a-3 .gallery_list06_container', {
	  slidesPerView: 1,
	  spaceBetween: 0,
	  loop: true,
	  pagination: {
		el: '.gallery_list06.b-a-3 .swiper-pagination',
		clickable: true,
	  },
	  navigation: {
		nextEl: '.gallery_list06.b-a-3 .swiper-button-next',
		prevEl: '.gallery_list06.b-a-3 .swiper-button-prev',
	  },
	});
</script>
<?php  ?>
<style>
					.mainpg_link02{
						position: relative;
						height: 360px;
						background-position: center;
						-webkit-background-size: cover;
						background-size: cover;
						background-repeat: no-repeat;
					}
					.mainpg_link02 .link_box{
						display: flex;
						flex-direction: column;
						width: 85%;
						max-width: 400px;
						padding: 30px 5%;
						box-sizing: border-box;
						position: absolute;
						top: 50%;
						left: 50%;
						transform: translate(-50%,-50%);
						text-align: center;
						background-color: rgba(1, 165, 226, 0.9);
						border-radius: 30px;
					}
					.mainpg_link02 .link_tit{
						order: 1;
						margin: 0 auto;
						width: 60%;
						min-width: 160px;
						max-width: 230px;
						padding: 6px 10px;
						font-size: 20px;
						border: 2px solid #fff;
						border-radius: 30px;
						color: #fff;
					}
					.mainpg_link02 .link_txt{
						order: 0;
						color: #fff;
						font-size: 18px;
						line-height: 1.8;
						margin-bottom: 30px;
					}
					
					
				</style>

				<style>
					.mainpg_link01{
						padding: 30px 0;
					}
					.mainpg_link01 .link_art{
						margin-bottom: 30px;
					}
					.mainpg_link01 .link_box{
						width: 90%;
						padding: 40px 16px;
						box-sizing: border-box;
						display: flex;
						flex-direction: column;
						text-align: center;
						color: #fff;
						font-family: 'Noto Sans',Arial,sans-serif;
					}
					.mainpg_link01 .link_tit{
						order: 1;
						margin-bottom: 0;
						font-size: 18px;
						border: none;
					}
					.mainpg_link01 .link_tit a{
						padding: 3px 16px;
						border: 3px solid #fff;
						border-radius: 30px;
						color: #fff;
					}
					.mainpg_link01 .link_txt{
						margin-bottom: 30px;
						order: 0;
						font-size: 18px;
						letter-spacing: 0.1em;
					}
					.mainpg_link01 .link_art01{
						position: relative;
					}
					.mainpg_link01 .link_art01 .link_box{
						margin-left: auto;
						margin-bottom: 140px;
						border-radius: 40px 0 0 40px;
						background-color: #ff8300;
						position: relative;
						z-index: 1;
					}
					.mainpg_link01 .link_art01 .link_img_back{
						width: 100vw;
						height: 250px;
						position: absolute;
						z-index: 0;
						top: 80px;
						right: 0;
						background-repeat: no-repeat;
						-webkit-background-size: cover;
						background-size: cover;
						background-position: center;
					}
				</style>
<section class="mainpg_link01">
	<h2 class="blind">quick link01</h2>
	
	<article class="link_art link_art01">
		<div class="link_box">
			<h3 class="link_tit btn"><a href="">ARTISAN STORY<span class="blind">shorcut</span></a></h3>
			<p class="link_txt">Fusce facilisis lorem sed aliquam feugiat.</p>
		</div>
		<div class="link_img_back" style="background-image: url(https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/20294344_2274795039459627_6411433453739904055_n.jpg?_nc_cat=103&_nc_ht=scontent-icn1-1.xx&oh=4988e0b25ca81e68ab0699ca5ac93e97&oe=5C8F3D8A)"></div>
	</article>
	
</section>


<section class="mainpg_link02" style="background-image: url(https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/20294344_2274795039459627_6411433453739904055_n.jpg?_nc_cat=103&_nc_ht=scontent-icn1-1.xx&oh=4988e0b25ca81e68ab0699ca5ac93e97&oe=5C8F3D8A)">
	<h2 class="blind">quick link01</h2>
	<div class="link_box">
		<h3 class="link_tit btn"><a href="">ARTISAN STORY <span class="blind">shorcut</span></a></h3>
		<p class="link_txt">Fusce facilisis lorem sed aliquam feugiat sed facilisis.</p>
	</div>
	
</section>
<!-- txt_list01 뉴스-->

<?php 
	$config = array(
			'skin' => 'mobile',
			'brd_key' => 'b-b-2',
			'is_gallery' => 1,
			'limit' => 5,
			'cache_minute' => 1,
		);
	echo $this->board->latest_main_free($config);

	?>
<?php

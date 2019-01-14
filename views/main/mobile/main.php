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

<section class="gallery_list06">
    <h2 class="title12">Artisan Menu</h2>
	<ul class="tab_cate01">
		<?php  

		foreach(element('product_list', $view) as $key => $value){
			if($key ===0)
				echo '<li class="active '.element('brd_key', $value).'"><a onClick="product_tab_change(\''.element('brd_key', $value).'\')">'.element('brd_name', $value).'</a></li>';
			else 
				echo '<li class="  '.element('brd_key', $value).'"><a onClick="product_tab_change(\''.element('brd_key', $value).'\')">'.element('brd_name', $value).'</a></li>';
		}
		?>
		
	</ul>
	<?php 
	foreach(element('product_list', $view) as $key => $value){

		if($key===0)  $active ="active";
        else $active ="";
		$config = array(
			'skin' => 'mobile',
			'brd_key' => element('brd_key', $value),
			'is_gallery' => 1,
			'cache_minute' => 1,
			'active' => $active,
		);
		echo $this->board->latest_main($config);
	}

	 ?>

</section>
	


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

	var swiper = new Swiper('div.gallery_list06_container', {
	  slidesPerView: 1,
	  spaceBetween: 0,
	  loop: true,
	  pagination: {
		el: 'div.gallery_list06_container .swiper-pagination',
		clickable: true,
	  },
	  navigation: {
		nextEl: 'div.gallery_list06_container .swiper-button-next',
		prevEl: 'div.gallery_list06_container.swiper-button-prev',
	  },
	});


	
</script>
<?php  ?>

<section class="mainpg_link01">
	<h2 class="blind">quick link01</h2>
	
	<article class="link_art link_art01">
		<div class="link_box">
			<h3 class="link_tit btn"><a href="/document/artisanbakery_info">ARTISAN STORY<span class="blind">shorcut</span></a></h3>
			<p class="link_txt">Fusce facilisis lorem sed aliquam feugiat.</p>
		</div>
		<div class="link_img_back" style="background-image: url(https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/20294344_2274795039459627_6411433453739904055_n.jpg?_nc_cat=103&_nc_ht=scontent-icn1-1.xx&oh=4988e0b25ca81e68ab0699ca5ac93e97&oe=5C8F3D8A)"></div>
	</article>
	
</section>


<!-- <section class="mainpg_link02" style="background-image: url(https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/20294344_2274795039459627_6411433453739904055_n.jpg?_nc_cat=103&_nc_ht=scontent-icn1-1.xx&oh=4988e0b25ca81e68ab0699ca5ac93e97&oe=5C8F3D8A)">
	<h2 class="blind">quick link01</h2>
	<div class="link_box">
		<h3 class="link_tit btn"><a href="">ARTISAN STORY <span class="blind">shorcut</span></a></h3>
		<p class="link_txt">Fusce facilisis lorem sed aliquam feugiat sed facilisis.</p>
	</div>
	
</section> -->
<!-- txt_list01 뉴스-->

<?php 
	$config = array(
			'skin' => 'mobile',
			'brd_key' => array('b-b-1','b-b-2'),
			'is_gallery' => 1,
			'limit' => 5,
			'cache_minute' => 1,
		);
	echo $this->board->latest_main_free($config);

	?>

<script>
	function product_tab_change(product_tab){

		$('ul.tab_cate01 li').removeClass('active');
		$('ul.tab_cate01 li.'+product_tab).addClass('active');

		$("div.gallery_list06_container").hide();
	    $("div.gallery_list06_container."+product_tab).fadeIn();
		
	}

	product_tab_change('b-a-1');
</script>
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
			'cache_minute' => 120,
			'active' => $active,
			'image_width' => 200,
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
		// autoplay: {
		// 	delay: 4000,
		// 	disableOnInteraction: false,
		// },
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
	  slidesPerView: 2,
	  spaceBetween: 5,
	  // loop: true,
	  freeMode: true,

	  pagination: {
		el: 'div.gallery_list06_container .swiper-pagination',
		clickable: true,
		dynamicBullets: true,
	  },
	  on: {
	      init: function () {
	        $('div.gallery_list06_container').css("visibility","visible");

	      },
	    },
	  /*navigation: {
		nextEl: 'div.gallery_list06_container .swiper-button-next',
		prevEl: 'div.gallery_list06_container .swiper-button-prev',
	  },*/
	});

	
	
	

	
</script>
<?php  ?>
<section class="img_ad01">
	<h2 class="blind">Have a good with Artisan</h2>
	<?php echo banner('default_banner') ?>
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
			'cache_minute' => 120,
		);
	echo $this->board->latest_main_free($config);

	?>
	<section class="img_ad01">
		<h2 class="blind">artisan story shortcut</h2>
		<a href="<?php echo base_url('document/artisanbakery_info') ?>"><img src="<?php echo base_url('assets/images/main_brand_stroy.jpg') ?>" alt="artisan story quick link"></a>
	</section>
<script>
	function product_tab_change(product_tab){

		$('ul.tab_cate01 li').removeClass('active');
		$('ul.tab_cate01 li.'+product_tab).addClass('active');

		$("div.gallery_list06_container").hide();
	    $("div.gallery_list06_container."+product_tab).fadeIn();
		
	}

	function product_tab_init(){

		

		$("div.gallery_list06_container.swiper-container:not(.active)").hide();
		
	    
		
	}
	product_tab_init();
</script>
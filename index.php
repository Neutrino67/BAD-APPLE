<?php

require_once "index_config.php";

$show_index = new Show_index;
$show_index->show_head('BadApple(伊甸园)');

echo <<<HTML

<div class="show_img">
	<img src="pic/pic_1.jpg" style="opacity:1;filter:alpha(opacity=100);">
	<img src="pic/pic_2.jpg">
	<img src="pic/pic_3.jpg">
	<img src="pic/pic_5.jpg">
</div>

<div class="main_box">
	<div class="main_box_title">
		<div class="main_box_name">数码</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">IPAD</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Nikon单反</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Beats耳机</div>
		</div>
	</div>
</div>

<div class="main_box">
	<div class="main_box_title">
		<div class="main_box_name">家居</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Sofa沙发</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Sea椅子</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Chair椅子</div>
		</div>
	</div>
</div>

<div class="main_box">
	<div class="main_box_title">
		<div class="main_box_name">食品</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Lemon柠檬</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Cake蛋糕</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Orange橘子</div>
		</div>
	</div>
</div>

<div class="main_box">
	<div class="main_box_title">
		<div class="main_box_name">生活</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">IPAD</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Nikon单反</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">Beats耳机</div>
		</div>
	</div>
</div>

<div class="main_box">
	<div class="main_box_title">
		<div class="main_box_name">图书</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">IPAD</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">IPAD</div>
		</div>
		<div class="main_box_info">
			<div class="main_box_img"><img src="pic/box_img.jpg"></div>
			<div class="main_box_text">IPAD</div>
		</div>
	</div>
</div>

<div class="index_slogn">多 · 快 · 好 · 省</div>

<script>
	var aImg = $('.show_img img');
	var iSize = aImg.size();
	var index = 0;

	function change(index){	
		aImg.stop();
		aImg.eq(index).siblings().animate({opacity:'0'},3000);
		aImg.eq(index).animate({opacity:'1'},3500);
	}
	
	function autoshow(){
		index = index + 1;
		if(index <= iSize - 1){
			change(index);
		}else{
			index = 0;
			change(index);
		}
	}
	
	setInterval(autoshow,4500);	
	
</script>

HTML;

$show_index->show_foot();

?>
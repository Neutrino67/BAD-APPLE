<?php

require_once "../index_config.php";

$type = $_GET['type'];

$mysqli=new mysqli("localhost","root","","tokyo");
$mysqli->query("SET NAMES utf8");

$sql = "select * from goods_type where id=$type";
$result = $mysqli->query($sql);

if($row = $result->fetch_array()){
	$type_name = $row['type_name'];
}

$show_index = new Show_index;
$show_index->show_head("$type_name");

$sql = "select * from attribute where type_id=$type";
$result = $mysqli->query($sql);

$i=0;

while($row = $result->fetch_array()){
	$id[]=$row['id'];
	$attr_name[]=$row['attr_name'];
	$i++;
}

for($h=0;$h<=$i-1;$h++){
	$l=0;		
	
	$sql = "select * from attribute_value where attr_id=$id[$h]";
	$result = $mysqli->query($sql);

	$k=0;

	while($row = $result->fetch_array()){
		$sid[]=$row['id'];
		$attribute_value_name[$h][]=$row['attr_value_name'];
		$k++;
		$attr_value_num[$h]=$k;
	}
}


if($i != 0){
$x=$_GET['id'];
$y=$_GET['sid'];

if($_GET['id'] == ""){
	$sql = "select * from goods_attri_index group by goods_id";
	$result = $mysqli->query($sql);
}else{
	$sql = "select * from goods_attri_index where attr_id='$x' and attr_value_id='$y'";
	$result = $mysqli->query($sql);
}

$js=0;

while($row = $result->fetch_array()){
	$goods_id[]=$row['goods_id'];
	$js++;
}

for($h=0;$h<=$js-1;$h++){
	$sql = "select * from goods_info where id=$goods_id[$h] and mid_type=$type";
	$result = $mysqli->query($sql);

	while($row = $result->fetch_array()){
		$goods_name[]=$row['goods_name'];
		$goods_price[]=$row['goods_price'];
	}
}

echo <<<HTML
<link rel="stylesheet" href="css/show.css">
	<div class="one">
		<div class ="ex">
		</div>
		<hr><div class ="two">
		$type_name 商品筛选 共 $js 商品
		</div>
		<hr>
HTML;

for($j=0;$j<=$i-1;$j++){
echo <<<HTML
		<div class ="three">
			<div class="three-key">$attr_name[$j] </div>
			<div class="three-value">
					<ul>
HTML;
	for($h=0;$h<=$attr_value_num[$j]-1;$h++){
		echo<<<HTML

						<li id="three-01">
							<a href="?id=$id[$j]&sid=$sid[$h]&type=$type" >{$attribute_value_name[$j][$h]}</a>
						</li>
HTML;
}

echo<<<HTML
					</ul>
				</div>
		</div>
		<hr>
HTML;
}

echo <<<HTML
		<div class ="four">
		</div>

	</div>
	<div class="second">
		<div class="second-01">
		</div>
		<div class ="second-02">
			<ul class="second-list">
HTML;
				for($h=0;$h<=$js-1;$h++){	
					$sql = "select * from goods_describle where goods_id=$goods_id[$h]";
					$result = $mysqli->query($sql);	
					if($row = $result->fetch_array()){
						$goods_describle=$row['describle_pic'];
echo<<<HTML
				<li>
					<div class="s-01">
						<div class="s-01-pic"><a href="http://121.42.211.188/badapple/detail/index.php?goods_id=$goods_id[$h]"><img width="250" height="250" src="http://121.42.211.188/$goods_describle"></a></div>
						<div class="s-01-money">￥{$goods_price[$h]}</div>
						<div class="s-01-name">{$goods_name[$h]}</div>
					</div>
				</li>
HTML;
					}

				}
				
				echo<<<HTML
			</ul>
		</div>
	</div>
	<div class ="third">
	</div>
HTML;

}else{
	
echo <<<HTML
	<div style="height:300px;">
		<div class ="ex">
		</div>
		<hr><div class ="two">
		很抱歉，暂时没有 $type_name 类型商品
		</div>
		<hr>
	</div>
HTML;

}

$show_index->show_foot();

?>
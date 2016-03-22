<?php

require_once "index_config.php";

$show_index = new Show_index;
$show_index->show_head('BadApple(伊甸园)');

$key = $_GET['key'];

$mysqli = new mysqli("localhost", "root", "", "tokyo");
$mysqli->query("SET NAMES utf8");

$sql = "SELECT * FROM goods_info WHERE goods_name LIKE '%$key%'";  
$result = $mysqli->query($sql);

echo "<div class=\"search_box\">
		<div style=\"font-size:22px;width:100%;margin:10px 0 15px 0;\">以下为 <b>$key</b> 的搜索结果: </div>";

$i=0;

while($row = $result->fetch_array()){
	$search_id[] = $row['id'];
	$search_name[] = $row['goods_name'];
	$search_price[] = $row['goods_price'];
	$i++;
}

for($j=0;$j<=$i;++$j){

$sql = "SELECT * FROM goods_describle WHERE goods_id=$search_id[$j]";  
$result = $mysqli->query($sql);

if($row = $result->fetch_array()){
	$pic = $row['describle_pic'];
}else $pic = "";

echo <<<HTML
		<a href="http://121.42.211.188/badapple/detail/index.php?goods_id=$search_id[$j]">
			<div class="search_detail">
				<div><img width="250px;" src="http://121.42.211.188/$pic"></div>
				<div style="width:100%">$search_name[$j]</div>
				<div style="width:100%">$search_price[$j]</div>
			</div>
		</a>
HTML;

}


echo "</div>";

$result->free();
$mysqli->close();

$show_index->show_foot();

?>
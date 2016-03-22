<?php
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
?>

<?php
	$pagenum = 1;
	if(isset($_REQUEST["pagenum"]))
	{
		$pagenum = $_REQUEST["pagenum"];
	}
?>

<html>
<head>
 <meta charset="UTF-8">
 <script type="text/javascript" src="./view/css/jquery-1.10.1.js"></script>
 <link rel="stylesheet" type="text/css" href="./view/css/pagestyle.css">
 <title>
	日志管理
 </title>
</head>
<body>
	<div class="page">
		<div class="fixed-bar">
			<div class="item-title">
				<h3>日志</h3>
				<ul class="tab-base">
					<li>
						<a href="./index.php?act=Log_manage&&op=getPage" class="current 1stpage" id="a1"><span>系统日志</span></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="fixed-empty"></div>
		<div class="1stpage">
		<form method="post" id="form_goods" action="">
		<table class="goods_table">
			<thead>
				<tr class="thead">
					<th class="w72th"></th>
					<th class="w72th">日志编号</th>
					<th colspan="5">日志内容</th>
					<th class="w72th">模块编号</th>
					<th class="w72th">记录时间</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once(BATH_PATH."/model/log.php");
				//require_once(BATH_PATH."/model/catalog.php");
				$model = new LogModel();
				$list = $model -> getInfoByPageNum($pagenum);
				$item_num = count($list);
				//$catalog_model = new CatalogModel();
				for ($i = 0; $i < $item_num; ++$i)
					{?>
						<tr class="goods_item">
							<td class="w72td">
								<span>*</span>
							</td>
							<td class="w72td">
								<p><?php echo $list[$i]["id"] + 110119120;?></p>
							</td>

							<td class="w60picture">
								<div class="thumb">
									<img src="" onload="javascript:DrawImage();">
								</div>
							</td>

							<td class="w72td">
							</td>

							<td class="wxinfo">
								<dl class="goods_info">
									<dt class="goods_name">
										<?php echo $list[$i]["id"]; ?>
									</dt>
									<dd class="goods_store">
										<?php echo $list[$i]["log_detail"]; ?>
									</dd>
								</dl>
							</td>

							<td class="w72td">
							</td>

							<td class="w72td">
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["module_id"]; ?></p>
							</td>

							<td class="w108td">
								<p><?php echo $list[$i]["log_date"]; ?></p>
							</td>
						</tr>
				<?php }?>
			</tbody>
			<tfoot>
				<tr class="tfoot">
					<td class="w72td">
					
					</td>

					<td style="position:relative; left:-20px;">
						
					</td>

					<td colspan="2">
				
					</td>

					<td colspan="6">
						<div class="pagination">
							<ul>
								<li>
									<span>首页</span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Log_manage&&op=getPage&&pagenum=".($pagenum - 1 >= 0 ? $pagenum - 1 : 0); ?>"><span>上一页</span></a>
								</li>

								<li>
									<span class="currentpage"><?php echo $pagenum >= 0 ? $pagenum : 0; ?></span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Log_manage&&op=getPage&&pagenum=".($pagenum + 1); ?>"><span>下一页</span></a>
								</li>

								<li>
									<span>末页</span>
								</li>
							</ul>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
	</form>
	</div>		
</body>
<script>
	
</script>
</html>
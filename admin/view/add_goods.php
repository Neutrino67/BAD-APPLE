<html>
	<head>
		<!--link rel="stylesheet" href="css/style1.css"-->
		<script src="./view/css/jquery-1.10.1.js" type="text/javascript"></script>
		<style>
			*{
	margin:0 atuo;
	padding:0;
}

body{
	text-align: center;
}

.show_box{
	position: relative;
	top:180px;
	box-shadow: 0 0 10px #B5B5B5;
	width:500px;
	height:400px;
	margin:0 auto;
	padding:0;
}

.show_detail{
	width: 100%;
	height:30px;
	margin-top: 10px;
}

.show_detail div{
	float: left;
}

.show_title{
	font-size: 20px;
	margin-left: 30px;
}

.show_text input{
	width: 350px;
	height:25px;
	margin-top: 2px;
	margin-left: 15px; 
}

.show_text select{
	width:125px;
	margin-left: 15px;
	margin-top:6px;
}

.show_btn div{
	float: left;
	margin-left: 20px;
	margin-top: 20px;
}

.show_btn input{
	-webkit-appearance: none;
	width:80px;
	height:27px;
	font-size: 15px;
	background: #B5B5B5;
	color:white;
	border: 1px solid #B5B5B5;
	text-align: center;
	margin-top: 6px;
	position: relative;
	padding-bottom: 1px;
	border-radius:8px;
	cursor: pointer;
}
		</style>
	</head>
	<body>
		<div class="show_box">
			<div class="show_detail" style="padding-top:50px;">
				<div class="show_title">商品名</div>
				<div class="show_text"><input type="text" id="goods_name"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">生产商</div>
				<div class="show_text"><input type="text" id="goods_produce"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp&nbsp&nbsp&nbsp价格</div>
				<div class="show_text"><input type="text" id="goods_price"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp&nbsp&nbsp&nbsp重量</div>
				<div class="show_text"><input type="text" id="goods_weight"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp&nbsp&nbsp&nbsp数量</div>
				<div class="show_text"><input type="text" id="goods_num"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp&nbsp&nbsp&nbsp分类</div>
				<div class="show_text">
					<select id="type_1">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<select id="type_2">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
			</div>
			<div class="show_btn">
				<div style="margin-left:150px;"><input type="button" value="提交" onClick="javascript:b4_submit()"></div>
				<div><input type="button" value="取消"></div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		document.getElementById('goods_name').focus();

		function b4_submit(){

			goods_name = document.getElementById('goods_name').value;
			goods_produce = document.getElementById('goods_produce').value;
			goods_price = document.getElementById('goods_price').value;
			goods_weight = document.getElementById('goods_weight').value;
			goods_num = document.getElementById('goods_num').value;
			type_1 = document.getElementById('type_1').value;
			type_2 = document.getElementById('type_2').value;

			if((goods_name == "")||(goods_produce == "")||(goods_price == "")||(goods_weight == "")||(goods_num == "")||(type_1 == "")||(type_2 == "")){
				alert("不能留空！");
				return;
			}

			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null){
				alert ("Browser does not support HTTP Request");
				return;
			}

			var url="./index.php?act=Goods_manage&op=addGoods&goods_name=" + goods_name + "&goods_produce=" + goods_produce + 
					"&goods_price=" + goods_price + "&goods_weight=" + goods_weight + "&goods_num=" + goods_num + 
					"&top_type=" + type_1 + "&mid_type=" + type_2 + "&sid="+Math.random();
			xmlHttp.onreadystatechange=saveStatus;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);

		}

		function saveStatus(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
				x = xmlHttp.responseText;
				alert(x);
			}
		}		

		function GetXmlHttpObject(){
			var xmlHttp=null;
			try{
				xmlHttp=new XMLHttpRequest();
			}catch (e){
				try{
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				}catch (e){
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			}

			return xmlHttp;
		}

	</script>
</html>
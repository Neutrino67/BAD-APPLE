<?php
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/util/db_manager.php');
require_once(ROOT_PATH.'/detail/Model/Goods.php');
require_once(ROOT_PATH.'/detail/Model/Comment.php');

class GoodsDataContext
{
	  private $db;
	  public function __construct()
	  {
		  $this->db=dbManager::getInstance();
	  }
	  public function __destruct()
	  {
		$this -> db = null;
	  }
	  
	  public function GetGoodsDetailInfoFromId($id)
	  {
		  $goods=new Goods();
		  
		  
		  $sql = "SELECT * 
	 			FROM  goods_info, goods_describle
	 			WHERE goods_info.id='$id' AND goods_info.id=goods_describle.goods_id";
	 	  $res_detail= $this -> db -> query($sql);
		  if(mysqli_num_rows($res_detail)>=1)
		  {
			  //获取商品一般信息
			  $row = $res_detail -> fetch_assoc();
			  $goods->id=$row['id'];
		      $goods->title=$row['goods_name'];
		      $goods->content=$row['describle_detail'];
		      $goods->price=$row['goods_price'];
			  $goods->pic=$row['describle_pic'];
		      $goods->score=$row['goods_score'];
			  $goods->sold=$row['goods_sold'];
			  
			  //获取商品评论
			  $sql = "SELECT * 
	 			FROM  goods_info, goods_comment, user_info
	 			WHERE goods_info.id='$id' AND goods_info.id=goods_comment.goods_id AND goods_comment.user_id=user_info.id";
	 	      $res_comments = $this -> db -> query($sql);
			   while ($row = $res_comments -> fetch_assoc())
		      {
			      $comment=new Comment();
		          $comment->user=$row['user_name'];
		          $comment->content=$row['comment_detail'];
		          $comment->score=$row['comment_rate'];
		          $goods->comments[]=$comment;
		      }
			  
			  //获取商品款式
			  $sql = "SELECT * 
	 			FROM  goods_info, goods_style
	 			WHERE goods_info.id='$id' AND goods_info.id=goods_style.goods_id";
	 	      $res_styles = $this -> db -> query($sql);
			  while ($row = $res_styles -> fetch_assoc())
		      {
		          $goods->type[]=$row['goods_style'];
		      }
		  }
		  
		  
		  /*
		  //Test
		  $goods->id=$id;
		  $goods->title="有印YOUIN合作插画师老墨插画作品陶瓷马克杯";
		  $goods->content="有印将艺术设计呈现为家居小物，用一幅画点亮你的宅生活。";
		  $goods->price="49.00";
		  $goods->type="";
		  $goods->pic="pic/l.png";
		  $goods->score=4.5;
		  
		  $comment1=new Comment();
		  $comment1->user="装酷小子";
		  $comment1->content="至少第一感觉让我很满意，试穿了一下，确实很暖和，就是号小了，本来第一印象很完美的衣服，真的可惜号小了，快递挺快的，比发韵达这种毒瘤快递好太多，想再买一件";
		  $comment1->score=5;
		  $goods->comments[]=$comment1;
		  $comment2=new Comment();
		  $comment2->user="Awesome";
		  $comment2->content="至少第一感觉让我很满意，试穿了一下，确实很暖和，就是号小了";
		  $comment2->score=4;
		  $goods->comments[]=$comment2;
		  */
		  return $goods;
	  }
      public function AddComment($goods_id,$user_id,$score,$content)
	  {
		  //获取当前日期
          date_default_timezone_set("PRC");
          $time= date("Y-m-d");
		  $sql = "INSERT INTO goods_comment 
		         (goods_id,comment_detail,comment_rate,comment_date,user_id)
	 			VALUES ('$goods_id','$content','$score','$time','$user_id')";
	 	  $res_detail= $this -> db -> query($sql);
	  }
}


?>
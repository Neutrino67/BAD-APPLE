<?php
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/detail/Control/Detail_DataProvider.php');


class GoodsInfoControler{
	private $id;
	private $goods;
	private $comments;
	private $dataContext;
	
	private $is_access_success;
	
	public function __construct($id)
	{
		$this->id=$id;
		$this->dataContext=new GoodsDataContext();
		#访问数据库
        $this->goods=$this->dataContext->GetGoodsDetailInfoFromId($id);
        if($this->goods->id==0) $this->is_access_success=0;
		else $this->is_access_success=1;
	}
	public function isAccess()
	{
		return $this->is_access_success;
	}
	public function GetGoods()
	{
		return $this->goods;
	}
	public function GetTitle()
	{
		return $this->goods->title;
	}
	
	public function AddComment($user_id,$score,$content)
	{
		$this->dataContext->AddComment($this->id,$user_id,$score,$content);
	}
}
?>
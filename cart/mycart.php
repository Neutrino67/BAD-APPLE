<?php 
include("wfCart/wfcart.php");
//扩充 wfCart 购物车运费
class myCart extends wfCart{
	var $deliverfee = 0;
	var $grandtotal = 0;
	
	function empty_cart()
	{ // 清空购物车
			$this->total = 0;
	        $this->itemcount = 0;
	        $this->deliverfee = 0;
	        $this->grandtotal = 0;
	        $this->items = array();             //reset items
	        $this->itemprices = array();    //reset itemprices
	        $this->itemqtys = array();       //reset itemqtys
	        $this->iteminfo = array();       //reset iteminfo
	} 

	function _update_total()
	{ // internal function to update the total in the cart
	    $this->itemcount = 0;
		$this->total = 0;
                          if(sizeof($this->items > 0))
		{
                        foreach($this->items as $item) {
                                $this->total = $this->total + ($this->itemprices[$item] * $this->itemqtys[$item]);
				$this->itemcount++;
			}
		}
		if($this->total >= 299){
			$this->deliverfee = 0;			
		}else{
			$this->deliverfee = 20;						
		}
		$this->grandtotal = $this->total+$this->deliverfee;		
	}
}
?>

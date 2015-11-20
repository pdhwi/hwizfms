<?php 
namespace Index\Model;

 class Product
 {
	public $product_id;
	public $product_name;
	public $product_proCat;
	public $product_feature;
	public $product_desc;
    public $product_PCimg;
    public $product_MBimg;
    public $product_price;
    public $product_orderBy;
    public $product_show;
	public $product_addtime;

     public function exchangeArray($data)
     {
        $this->product_id      = (!empty($data['product_id'])) ? $data['product_id'] : null;
        $this->product_name    = (!empty($data['product_name'])) ? $data['product_name'] : null;
        $this->product_proCat  = (!empty($data['product_proCat'])) ? $data['product_proCat'] : null;
        $this->product_feature = (!empty($data['product_feature'])) ? $data['product_feature'] : null;
        $this->product_desc    = (!empty($data['product_desc'])) ? $data['product_desc'] : null;
        $this->product_PCimg   = (!empty($data['product_PCimg'])) ? $data['product_PCimg'] : null;
        $this->product_MBimg   = (!empty($data['product_MBimg'])) ? $data['product_MBimg'] : null;
        $this->product_price   = (!empty($data['product_price'])) ? $data['product_price'] : null;
        $this->product_orderBy = (!empty($data['product_orderBy'])) ? $data['product_orderBy'] : null;
        $this->product_show    = (!empty($data['product_show'])) ? $data['product_show'] : 0;
        $this->product_addtime = (!empty($data['product_addtime'])) ? $data['product_addtime']: null;
     }
 }
?>
<?php 
namespace Index\Model;

 class Link
 {
	public $link_id;
	public $link_title;
	public $link_url;
	public $link_orderBy;
	public $link_show;

     public function exchangeArray($data)
     {
        $this->link_id      = (!empty($data['link_id'])) ? $data['link_id'] : null;
        $this->link_title    = (!empty($data['link_title'])) ? $data['link_title'] : null;
        $this->link_url  = (!empty($data['link_url'])) ? $data['link_url'] : null;
        $this->link_orderBy = (!empty($data['link_orderBy'])) ? $data['link_orderBy'] : null;
        $this->link_show    = (!empty($data['link_show'])) ? $data['link_show'] : null;
    }
 }
?>
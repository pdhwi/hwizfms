<?php 
namespace Hwi\Model;

 class artcat
 {
	public $artCat_id;
	public $artcat_title;
	public $artcat_entitle;
	public $artCat_show;
	public $artCat_orderBy;
	public $artCat_count;

     public function exchangeArray($data)
     {
         $this->artCat_id     = (!empty($data['artCat_id'])) ? $data['artCat_id'] : null;
         $this->artcat_title = (!empty($data['artCat_title'])) ? $data['artCat_title'] : null;
         $this->artcat_entitle  = (!empty($data['artcat_entitle'])) ? $data['artcat_entitle'] : null;
         $this->artCat_show  = (!empty($data['artCat_show'])) ? $data['artCat_show'] : null;
         $this->artCat_orderBy  = (!empty($data['artCat_orderBy'])) ? $data['artCat_orderBy'] : null;
         $this->artCat_count  = (!empty($data['artCat_count'])) ? $data['artCat_count'] : null;
     }
 }
?>
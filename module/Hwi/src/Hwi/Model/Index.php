<?php 
namespace Hwi\Model;

 class Index
 {
     public $nav_id;
     public $nav_title;
     public $nav_topid;
     public $nav_show;
     public $nav_orderBy;
     public $nav_url;

     public function exchangeArray($data)
     {
         $this->nav_id     = (!empty($data['nav_id'])) ? $data['nav_id'] : null;
         $this->nav_title = (!empty($data['nav_title'])) ? $data['nav_title'] : null;
         $this->nav_topid  = (!empty($data['nav_topid'])) ? $data['nav_topid'] : null;
         $this->nav_show  = (!empty($data['nav_show'])) ? $data['nav_show'] : null;
         $this->nav_orderBy  = (!empty($data['nav_orderBy'])) ? $data['nav_orderBy'] : 0;
         $this->nav_url  = (!empty($data['nav_url'])) ? $data['nav_url'] : null;
     }
 }
?>
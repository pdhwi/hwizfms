<?php 
namespace Hwi\Model;

 class Banner
 {
     public $banner_id;
     public $banner_title;
     public $banner_url;
     public $banner_image;
     public $banner_show;
     public $banner_orderBy;

     public function exchangeArray($data)
     {
         $this->banner_id     = (!empty($data['banner_id'])) ? $data['banner_id'] : null;
         $this->banner_title = (!empty($data['banner_title'])) ? $data['banner_title'] : null;
         $this->banner_url  = (!empty($data['banner_url'])) ? $data['banner_url'] : null;
         $this->banner_image  = (!empty($data['banner_image'])) ? $data['banner_image'] : null;
         $this->banner_show  = (!empty($data['banner_show'])) ? $data['banner_show'] : 0;
         $this->banner_orderBy  = (!empty($data['banner_orderBy'])) ? $data['banner_orderBy'] : null;
     }
 }
?>
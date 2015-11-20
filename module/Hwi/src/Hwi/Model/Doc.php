<?php 
namespace Hwi\Model;

 class Doc
 {
	public $doc_id;
	public $doc_title;
	public $doc_content;
	public $doc_show;
	public $doc_enTitle;
	public $doc_position;

     public function exchangeArray($data)
     {
         $this->doc_id     = (!empty($data['doc_id'])) ? $data['doc_id'] : null;
         $this->doc_title = (!empty($data['doc_title'])) ? $data['doc_title'] : null;
         $this->doc_content  = (!empty($data['doc_content'])) ? $data['doc_content'] : null;
         $this->doc_show  = (!empty($data['doc_show'])) ? $data['doc_show'] : null;
         $this->doc_enTitle  = (!empty($data['doc_enTitle'])) ? $data['doc_enTitle'] : null;
         $this->doc_position  = (!empty($data['doc_position'])) ? $data['doc_position'] : null;
     }
 }
?>
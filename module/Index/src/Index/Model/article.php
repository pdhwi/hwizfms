<?php 
namespace Index\Model;

 class article
 {
	public $article_id;
    public $article_artCat;
	public $article_title;
	public $article_author;
	public $article_click;
	public $article_addTime;
	public $article_content;

     public function exchangeArray($data)
     {
         $this->article_id     = (!empty($data['article_id'])) ? $data['article_id'] : null;
         $this->article_artCat = (!empty($data['article_artCat'])) ? $data['article_artCat'] : null;
         $this->article_title  = (!empty($data['article_title'])) ? $data['article_title'] : null;
         $this->article_author  = (!empty($data['article_author'])) ? $data['article_author'] : null;
         $this->article_click  = (!empty($data['article_click'])) ? $data['article_click'] : null;
         $this->article_addTime  = (!empty($data['article_addTime'])) ? $data['article_addTime'] : null;
         $this->article_content  = (!empty($data['article_content'])) ? $data['article_content'] : null;
     }
 }
?>
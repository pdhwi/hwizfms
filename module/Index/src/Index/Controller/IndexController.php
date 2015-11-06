<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Index\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    //轮播图
	protected $BannerTable;
	public function getBannerTable()
    {
         if (!$this->BannerTable) {
             $sm = $this->getServiceLocator();
             $this->BannerTable = $sm->get('Index\Model\BannerTable');
         }
         return $this->BannerTable;
    }
    //公司简介
    protected $getDocTable;
    public function getDocTable()
    {
         if (!$this->getDocTable) {
             $sm = $this->getServiceLocator();
             $this->getDocTable = $sm->get('Doc\Model\DocTable');
         }
         return $this->getDocTable;
    }
    //文章分类
    protected $getartcatTable;
    public function getartcatTable()
    {
         if (!$this->getartcatTable) {
             $sm = $this->getServiceLocator();
             $this->getartcatTable = $sm->get('artcat\Model\artcatTable');
         }
         return $this->getartcatTable;
    }
    //文章
    protected $getarticleTable;
    public function getarticleTable()
    {
         if (!$this->getarticleTable) {
             $sm = $this->getServiceLocator();
             $this->getarticleTable = $sm->get('article\Model\articleTable');
         }
         return $this->getarticleTable;
    }

    public function indexAction()
    {
        //轮播图
    	$where=array(
                'Banner_show'=>'0',
    			
    		);
    	$banner=iterator_to_array($this->getBannerTable()->fetchAll($where,'banner_orderBy desc'));
        //公司简介
        $where=array(
                'doc_position'=>'about_us',
                'doc_show'=>'0',
            );
        $doc=iterator_to_array($this->getDocTable()->fetchAll($where));
        //文章
        $where=array(
                'artCat_show'=>'0',
            );
        $artcat=iterator_to_array($this->getartcatTable()->fetchAll($where,'artcat_orderBy desc'));
        $arr=array();
        foreach($artcat as $key=>$val){//获取文章分类
                $where=array(
                'article_artCat'=>$val->artCat_id,
                'article_show'=>'0',
            );
            $article=$this->getarticleTable()->fetchAll($where,'article_orderBy desc',5);//获取所属文章
            foreach($article as $ke=>$va){//数据重组
                $arr[$val->artcat_entitle][]=$va;
            }
        }
        //赋值
    	return array(
             'banner'=>$banner,
             'doc'=>$doc['0'],
             'artcat'=>$artcat,
             'arr'=>$arr,
         );
    }

    public function addAction()
    {
        return new ViewModel();
    }

}

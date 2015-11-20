<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Knowledge\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class KnowledgeController extends AbstractActionController
{
     protected $getKnowledgeTable;
    public function getKnowledgeTable()
    {
         if (!$this->getKnowledgeTable) {
             $sm = $this->getServiceLocator();
             $this->getKnowledgeTable = $sm->get('Hwi\Model\articleTable');
         }
         return $this->getKnowledgeTable;
    }

    //文章分类
    protected $getartcatTable;
    public function getartcatTable()
    {
         if (!$this->getartcatTable) {
             $sm = $this->getServiceLocator();
             $this->getartcatTable = $sm->get('Hwi\Model\artcatTable');
         }
         return $this->getartcatTable;
    }

    public function indexAction()
    {;
        $sub=new \Zend\Stdlib\StringWrapper\MbString();//截取字符串
        $hydrator= new \Zend\Stdlib\Hydrator\ArraySerializable();
        //获取文章分类
        $where=array(
                'artCat_show'=>'0',
            );
        $artcat=iterator_to_array($this->getartcatTable()->fetchAll($where,['artCat_orderBy desc']));
 
        $type =$this->params()->fromRoute('type',null);
        if(!$type){
            $type=$artcat[0]->artCat_id;
        }
        $pag  =$this->params()->fromRoute('pag',1);
        //文章所属分类信息
        $where=array(
                'article_artCat'=>$type,
                'article_show'=>'0',
            );
        //数据分页
        $paginator = $this->getKnowledgeTable()->fetchAll($where,['article_orderBy desc','article_addtime desc'],'',true);
        
        $paginator->setCurrentPageNumber((int)$this->params()->fromRoute('pag',1));
        $paginator->setItemCountPerPage(10);
        
        return new ViewModel(array(
            'paginator'=>$paginator,
            'sub'=>$sub,
            'artcat'=>$artcat,
            'type'=>$type,
            'pag'=>$pag,
            ));
    }
    public function infoAction()
    {
		$result = $this->getRequest();
        $id=$result->getQuery('id',null);
       
        if(!preg_match("/^[0-9]*$/",$id)){
            exit('Don\'t get destroyed');
        }
        $result = $this->getKnowledgeTable()->getarticle($id);

        return [
            'result'=>$result,
        ];
    }


}

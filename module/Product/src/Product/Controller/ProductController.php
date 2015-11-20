<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
	//公司简介
    protected $getProductTable;
    public function getProductTable()
    {
         if (!$this->getProductTable) {
             $sm = $this->getServiceLocator();
             $this->getProductTable = $sm->get('Hwi\Model\ProductTable');
         }
         return $this->getProductTable;
    }

    public function indexAction()
    {
        $id   =$this->params()->fromRoute('id',null);
        $type =$this->params()->fromRoute('type',null);
        $pag  =$this->params()->fromRoute('pag',1);

    	//公司简介
        $where=array(
                'product_show'=>'0',
            );
        //$pro=iterator_to_array($this->getProductTable()->fetchAll($where,'product_orderBy desc'));

        $paginator = $this->getProductTable()->fetchAll($where,'product_orderBy desc','',true);
        $paginator->setCurrentPageNumber((int)$this->params()->fromRoute('pag',1));
        $paginator->setItemCountPerPage(8);

        return new ViewModel(array('paginator'=>$paginator));
    }

    public function infoAction(){
        $result = $this->getRequest();
        $id=$result->getQuery('id',null);
       
        if(!preg_match("/^[0-9]*$/",$id)){
            exit('Don\'t get destroyed');
        }
        $pro = $this->getProductTable()->getartPro($id);
        return [
            'pro'=>$pro,
        ];
    }
}

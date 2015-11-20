<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace AboutUs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class AboutUsController extends AbstractActionController
{
    
	//公司简介
    protected $getDocTable;
    public function getDocTable()
    {
         if (!$this->getDocTable) {
             $sm = $this->getServiceLocator();
             $this->getDocTable = $sm->get('Hwi\Model\DocTable');
         }
         return $this->getDocTable;
    }

    public function indexAction()
    {

    	//公司简介
        $where=array(
                'doc_position'=>'about_us',
                'doc_show'=>'0',
            );
        $doc=iterator_to_array($this->getDocTable()->fetchAll($where));
        return array(
                'doc'=>$doc[0],
            );
    }

}

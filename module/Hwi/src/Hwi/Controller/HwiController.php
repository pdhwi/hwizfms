<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hwi\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class HwiController extends AbstractActionController
{
    
    protected $getiIdexTable;
    public function getiIdexTable()
    {
         if (!$this->getiIdexTable) {
             $sm = $this->getServiceLocator();
             $this->getiIdexTable = $sm->get('Hwi\Model\navTable');
         }
         return $this->getiIdexTable;
    }

    public function indexAction()
    {		
    	//$result = $this->getiIdexTable()->fetchAll(['nav_show'=>0],array('nav_orderBy desc '));


    }

    public function headerAction()
    {		

    	$result = $this->getiIdexTable()->fetchAll(['nav_show'=>0],array('nav_orderBy desc '));

    	return new ViewModel(array('nav'=>$result));
    }


}

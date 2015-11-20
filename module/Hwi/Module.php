<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hwi;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Hwi\Model\Banner;
use Hwi\Model\BannerTable;
use Hwi\Model\Doc;
use Hwi\Model\DocTable;
use Hwi\Model\artcat;
use Hwi\Model\artcatTable;
use Hwi\Model\article;
use Hwi\Model\articleTable;
use Hwi\Model\Product;
use Hwi\Model\ProductTable;
use Hwi\Model\Link;
use Hwi\Model\LinkTable;
use Hwi\Model\Index;
use Hwi\Model\IndexTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

   
    
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                'Hwi\Model\navTable' =>  function($sm) {
                     $tableGateway = $sm->get('navTableGateway');
                     $table = new bannerTable($tableGateway);
                     return $table;
                 },
                 'navTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Index());
                     return new TableGateway('hwi_nav', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Hwi\Model\BannerTable' =>  function($sm) {
                     $tableGateway = $sm->get('BannerTableGateway');
                     $table = new bannerTable($tableGateway);
                     return $table;
                 },
                 'BannerTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new banner());
                     return new TableGateway('hwi_banner', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Hwi\Model\DocTable' =>  function($sm) {
                     $tableGateway = $sm->get('DocTableGateway');
                     $table = new DocTable($tableGateway);
                     return $table;
                 },
                 'DocTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Doc());
                     return new TableGateway('hwi_Doc', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Hwi\Model\artcatTable' =>  function($sm) {
                     $tableGateway = $sm->get('artcatTableGateway');
                     $table = new artcatTable($tableGateway);
                     return $table;
                 },
                 'artcatTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new artcat());
                     return new TableGateway('hwi_artcat', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Hwi\Model\articleTable' =>  function($sm) {
                     $tableGateway = $sm->get('articleTableGateway');
                     $table = new articleTable($tableGateway);
                     return $table;
                 },
                 'articleTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new article());
                     return new TableGateway('hwi_article', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Hwi\Model\ProductTable' =>  function($sm) {
                     $tableGateway = $sm->get('ProductTableGateway');
                     $table = new ProductTable($tableGateway);
                     return $table;
                 },
                 'ProductTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Product());
                     return new TableGateway('hwi_Product', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Hwi\Model\LinkTable' =>  function($sm) {
                     $tableGateway = $sm->get('LinkTableTableGateway');
                     $table = new ProductTable($tableGateway);
                     return $table;
                 },
                 'LinkTableTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Link());
                     return new TableGateway('hwi_link', $dbAdapter, null, $resultSetPrototype);
                 },
                'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
             ),
         );
     }
}

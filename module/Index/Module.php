<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Index;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Index\Model\Banner;
use Index\Model\BannerTable;
use Index\Model\Doc;
use Index\Model\DocTable;
use Index\Model\artcat;
use Index\Model\artcatTable;
use Index\Model\article;
use Index\Model\articleTable;
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
                 'Index\Model\BannerTable' =>  function($sm) {
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
                 'Doc\Model\DocTable' =>  function($sm) {
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
                 'artcat\Model\artcatTable' =>  function($sm) {
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
                 'article\Model\articleTable' =>  function($sm) {
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
                'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
             ),
         );
     }
}

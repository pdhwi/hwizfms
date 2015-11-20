<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hwi;

return array(
     'controllers' => array(
         'invokables' => array(
             'Hwi\Controller\Hwi' => 'Hwi\Controller\HwiController',
         ),
     ),

      'router' => array(
         'routes' => array(
             'Hwi' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/Hwi[/:action].html',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Hwi\Controller\Hwi',
                         'action'     => 'index',
                         
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/PageLayout'           => __DIR__ . '/../view/layout/PageLayout.phtml',
            'Hwi/index/index' => __DIR__ . '/../view/Hwi/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
 );

<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Product;

return array(
     'controllers' => array(
         'invokables' => array(
             'Product\Controller\Product' => 'Product\Controller\ProductController',
         ),
     ),

      'router' => array(
         'routes' => array(
             'Product' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/Product[/:action].html[/:pag][/:type]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'pag'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Product\Controller\Product',
                         'action'     => 'index',
                         'pag'        =>'1'
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
            'Product/index/index' => __DIR__ . '/../view/Product/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
 );

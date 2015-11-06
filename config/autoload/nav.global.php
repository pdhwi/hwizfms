<?php
return array(
     'navigation' => array(
         'default' => array(
             array(
                 'label' => '首页',
                 'route' => 'home',
             ),
             array(
                 'label' => '公司简介',
                 'route' => 'AboutUs', 
                 'controller' => 'AboutUs',
                 'action'     => 'Index',
                 'resource'   => 'AboutUs\Controller\Index',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '产品展示',
                 'route' => 'Product', 
                 'controller' => 'Product',
                 'action'     => 'Index',
                 'resource'   => 'Product\Controller\Index',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '行业资讯',
                 'route' => 'Knowledge', 
                 'controller' => 'Knowledge',
                 'action'     => 'Index',
                 'resource'   => 'Knowledge\Controller\Index',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '客户留言',
                 'route' => 'Message', 
                 'controller' => 'Message',
                 'action'     => 'Index',
                 'resource'   => 'Message\Controller\Index',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '联系我们',
                 'route' => 'ContactUs', 
                 'controller' => 'ContactUs',
                 'action'     => 'Index',
                 'resource'   => 'ContactUs\Controller\Index',
                 'privilege'  => 'Index',
             ),
             
        ),
     ),

);

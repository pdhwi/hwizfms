<?php
return array(
     'navigation' => array(
         'default' => array(
             array(
                 'label' => '首页',
                 'route' => 'Index',
                 'controller' => 'Index',
                 'action'     => 'Index',
                 'resource'   => 'Index\Controller',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '公司简介',
                 'route' => 'AboutUs', 
                 'controller' => 'AboutUs',
                 'action'     => 'Index',
                 'resource'   => 'AboutUs\Controller',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '产品展示',
                 'route' => 'Product', 
                 'controller' => 'Product',
                 'action'     => 'Index',
                 'resource'   => 'Product\Controller',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '文章信息',
                 'route' => 'Knowledge', 
                 'controller' => 'Knowledge',
                 'action'     => 'Index',
                 'resource'   => 'Knowledge\Controller',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '客户留言',
                 'route' => 'Message', 
                 'controller' => 'Message',
                 'action'     => 'Index',
                 'resource'   => 'Message\Controller',
                 'privilege'  => 'Index',
             ),
             array(
                 'label' => '联系我们',
                 'route' => 'ContactUs', 
                 'controller' => 'ContactUs',
                 'action'     => 'Index',
                 'resource'   => 'ContactUs\Controller',
                 'privilege'  => 'Index',
             ),
             
        ),
     ),

);

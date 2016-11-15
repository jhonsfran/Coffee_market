<?php

return array(
    'controllers' => array(
    ),
    'router' => array(
        'routes' => array(
            'compra' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/compra[/:action]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Compra\Controller',
                        'controller' => 'compra',
                        'action' => 'admin'
                    ),
                ),
            ),
            'proveedor' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/proveedor[/:action]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Compra\Controller',
                        'controller' => 'proveedor'
                    ),
                ),
            ),
            
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'compra' => __DIR__ . '/../view',
 
        ),
     'strategies' => array(
            'ViewJsonStrategy',
        ),
        
    ),
);

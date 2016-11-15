<?php

return array(
    'controllers' => array(
    ),
    'router' => array(
        'routes' => array(
            'producto' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/producto[/:action]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Producto\Controller',
                        'controller' => 'producto',
                        'action' => 'admin'
                    ),
                ),
            ),
            'ubicacion' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ubicacion[/:action]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Producto\Controller',
                        'controller' => 'ubicacion'
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'producto' => __DIR__ . '/../view',
 
        ),
     'strategies' => array(
            'ViewJsonStrategy',
        ),
        
    ),
);

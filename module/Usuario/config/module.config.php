<?php

return array(
    'controllers' => array(
    ),
    'router' => array(
        'routes' => array(
            'usuario' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/usuario[/:action]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Usuario\Controller',
                        'controller' => 'usuario',
                        'action' => 'admin'
                    ),
                ),
            ),
            'tipocuenta' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/tipocuenta[/:action]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Usuario\Controller',
                        'controller' => 'tipocuenta'
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'usuario' => __DIR__ . '/../view',
 
        ),
     'strategies' => array(
            'ViewJsonStrategy',
        ),
        
    ),
);

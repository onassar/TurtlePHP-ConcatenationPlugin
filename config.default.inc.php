<?php

    /**
     * Plugin Config Data
     * 
     */

    /**
     * $routes
     * 
     * @var     array
     * @access  private
     */
    $routes = array(
        '^/concatenation/all$' => array(// G
            'controller' => 'Controller\\Concatenation',
            'action' => 'actionConcatenateAll',
            'view' => dirname(__FILE__) . '/raw.inc.php'
        ),
        '^/concatenation/([a-zA-Z0-9\-_]+)$' => array(// G
            'controller' => 'Controller\\Concatenation',
            'action' => 'actionConcatenate',
            'view' => dirname(__FILE__) . '/raw.inc.php'
        )
    );

    /**
     * $batches
     * 
     * @var     array
     * @access  private
     */
    $batches = array(
        'app' => array(
            // 'contentType' => 'text/plain',
            'extension' => 'txt',
            'storage' => WEBROOT . '/app/static/js/compiled',
            'files' => array(
            )
        )
    );

    /**
     * $pluginConfigData
     * 
     * @var     array
     * @access  private
     */
    $pluginConfigData = compact('routes', 'batches');

    /**
     * Storage
     * 
     */
    $key = 'TurtlePHP-ConcatenationPlugin';
    TurtlePHP\Plugin\Config::set($key, $pluginConfigData);

<?php

    // Namespace overhead
    namespace Controller;

    /**
     * Concatenation
     * 
     * Provides two controller actions which can be useful for dynamically
     * generating batches based on HTTP requests.
     * 
     * Very important to note that if this is called via something like a build
     * script which runs under a different user:group combination as HTTP
     * requests do, you can run into permission issues when attempting access
     * and/or overwrite existing batch files.
     * 
     * @extends \TurtlePHP\Controller
     * @final
     */
    final class Concatenation extends \TurtlePHP\Controller
    {
        /**
         * actionConcatenate
         * 
         * @access  public
         * @param   string $batchKey
         * @return  void
         */
        public function actionConcatenate(string $batchKey)
        {
            $path = \TurtlePHP\Plugin\Concatenation::getBatchPath($batchKey);
            $path = WEBROOT . ($path);
            $content = file_get_contents($path);
            $this->_pass('response', $content);
            header('Content-type: text/javascript');
        }

        /**
         * actionConcatenateAll
         * 
         * @access  public
         * @return  void
         */
        public function actionConcatenateAll()
        {
            $config = \TurtlePHP\Plugin\Config::get('TurtlePHP-ConcatenationPlugin');
            $batches = $config['batches'];
            $paths = array();
            foreach ($batches as $key => $settings) {
                $paths[$key] = \TurtlePHP\Plugin\Concatenation::getBatchPath($key);
            }
            $success = true;
            $data = compact('paths');
            $response = compact('success', 'data');
            $encodedResponse = json_encode($response);
            $this->_pass('response', $encodedResponse);
        }
    }

<?php

namespace MVC_model2\Engine\Router;

class Route {
    
    /**
     * @var string URL path
     */
    protected $path;
    
    /**
     * @var string path to controller
     */
    protected $file;
    
    /**
     * @var class name
     */
    protected $class;
    
    /**
     * @var string method name 
     */
    protected $method;
    
    /**
     * @var array default parameters
     */
    protected $defaults;
    
    /**
     * @var array processing rules for parameters
     */
    protected $params;
    
    /**
     * @param string $path URL path
     * @param array $config array containing path to controller and method name
     * @param array $params array containing processing rules for parameters
     * @param array $defaults default parameters
     */
    public function __construct($path, $config, $params = array(), $defaults = array()) {
        $this->path = $path;
        $this->file = $config['file'];
        $this->method = $config['method'];
        $this->class = $config['class'];
        $this->setParams($params);
        $this->setDefaults($defaults);
    }
    
    function getPath() {
        return $this->path;
    }

    function getFile() {
        return $this->file;
    }

    function getClass() {
        return $this->class;
    }

    function getMethod() {
        return $this->method;
    }

    function getDefaults() {
        return $this->defaults;
    }

    function getParams() {
        return $this->params;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setFile($file) {
        $this->file = $file;
    }

    function setClass($class) {
        $this->class = $class;
    }

    function setMethod($method) {
        $this->method = $method;
    }

    function setDefaults($defaults) {
        $this->defaults = $defaults;
    }

    function setParams($params) {
        $this->params = $params;
    }

    public function generateUrl($data) {
        if(is_array($data) && sizeof($data)>0) {
            $key_data = array_keys($data);
            foreach ($key_data as $key) {
                $data2['<' . $key .  '>'] = $data[$key];
            }
            $url = str_replace(array('?', '(', ')'), array('', '', ''), $this->path);
            return str_replace(array_keys($data2), $data2, $url);
        } else {
            $url = preg_replace("#<[a-zA-Z0-9]*>#", '', $this->path, 1);
            return str_replace(array('?', '(', ')'), array('', '', ''), $url);
        }
    }
}
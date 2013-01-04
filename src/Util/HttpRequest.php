<?php

namespace Util;

/**
 * This is just a basic wrapper around $_GET, $_POST and  $_SERVER. 
 * This will make testing simpler and provide some extra functionality. 
 * Support could be added for filtering, as well as for cookies.
 *
 * @author beneppel
 */
class HttpRequest {

    /**
     * Holder for $_POST super global
     * 
     * @var array 
     */
    protected $post = array();

    /**
     * Holder for $_GET super global
     * 
     * @var array 
     */
    protected $get = array();

    /**
     * Holder for $_SERVER super global
     * 
     * @var array 
     */
    protected $server = array();

    /**
     * 
     * @param array $get
     * @param array $post
     * @param array $server
     */
    protected function __construct(array $get, array $post, array $server) {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

    /**
     *  return new instance based on available super globals
     */
    public static function createFromGlobals() {
        return self::create($_GET, $_POST, $_SERVER);
    }

    /**
     * Create new instance based on passed in parameters
     * 
     * @param array $get
     * @param array $post
     * @param array $server
     */
    public static function create(array $get, array $post, array $server) {
        return new self($get, $post, $server);
    }

    /**
     * Get an element from get or post indexed by key order of preference POST, GET
     * 
     * @param String $key
     */
    public function get($key, $default = false) {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        } elseif (isset($this->get[$key])) {
            return $this->get[$key];
        }
        return $default;
    }

    /**
     * Get an element from $get indexed by $key
     * 
     * @param String $key
     */
    public function getGetParameter($key, $default = false) {

        if (isset($this->get[$key])) {
            return $this->get[$key];
        }
        return $default;
    }

    /**
     * Get an element from $post indexed by $key
     * 
     * @param String $key
     */
    public function getPostParameter($key, $default = false) {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }
        return $default;
    }

    /**
     * Get a value from $server indexed by key
     * 
     * @param String $key
     */
    public function getHeader($key, $default = false) {
        if (isset($this->server[$key])) {
            return $this->server[$key];
        } elseif (isset($this->server[strtoupper($key)])) {
            return $this->server[strtoupper($key)];
        }
    }
    
    public function isMethod($method){
        if(strtoupper($method) == $this->getHeader('REQUEST_METHOD')){
            return true;
        }
        else{
            return false;
        }
    }

}

?>

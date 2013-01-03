<?php

namespace Util;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HttpRequest
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
    protected function __construct( array $get, array $post, array $server) 
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }
    
    /**
     *  return new instance based on available super globals
     */
    public static function createFromGlobals()
    {
        return false;
    }
    
    /**
     * Create new instance based on passed in parameters
     * 
     * @param array $get
     * @param array $post
     * @param array $server
     */
    public static function create(array $get, array $post, array $server)
    {
        return new self($get, $post, $server);
    }
    
    /**
     * Get an element from get or post indexed by key order of preference POST, GET
     * 
     * @param String $key
     */
    public function get( $key, $default=false )
    {
        if(isset($this->post[$key]))
        {
            return $this->post[$key];
        }
        elseif(isset($this->get[$key]))
        {
            return $this->get[$key];
        }
        return $default;
    }
    
    /**
     * Get an element from $get indexed by $key
     * 
     * @param String $key
     */
    public function getGetParameter( $key ){
        
        return false;
    }
    
    /**
     * Get an element from $post indexed by $key
     * 
     * @param String $key
     */
    public function getPostParameter( $key ){
        
        return false;
    }
    
    /**
     * Get a value from $server indexed by key
     * 
     * @param String $key
     */
    public function getHeader( $key ){
        
        return false;
    }
    
}

?>

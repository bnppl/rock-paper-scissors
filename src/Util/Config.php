<?php

namespace Util;

/**
 * Description of Config
 *
 * @author beneppel
 */
class Config {

    protected $parameters = array();

    public function __construct($params) {
        $this->parameters = $params;
    }

    public static function loadFromPHPFile($file_path) {
        if (file_exists($file_path)) {
            $parameters = include $file_path;
            if(is_array($parameters)){
                return new self($parameters);
            }
            else{
                throw new \Exception('Config file must return an array: ' . $file_path);
            }
        } else {
            throw new \Exception('No config file found: ' . $file_path);
        }
    }

    public function get($key, $default = false) {
        if(isset($this->parameters[$key])){
            return $this->parameters[$key];
        }
        return $default;
        return false;
    }

}

?>

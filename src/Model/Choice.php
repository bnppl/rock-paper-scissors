<?php

namespace Model;

/**
 * Description of Choice
 *
 * @author beneppel
 */
class Choice {
    
    protected $weapon;
    
    protected $options = array(
        'rock',
        'paper',
        'scissors',
    );

    public function __construct($weapon = false) {
       
        if($weapon ==false ){
            $key = array_rand($this->options);
            $this->weapon = $this->options[$key];
        }
        elseif(in_array(strtolower($weapon), $this->options)){
            $this->weapon = strtolower($weapon);
        }
        else{
            throw(new \Exception('Invalid weapon choice'));
        }
        
    }
    
    public function getWeapon()
    {
        return $this->weapon;
    }
    
    public function compare(Choice $choice)
    {
        $opponentWeapon = $choice->getWeapon();
        $myWeapon = $this->getWeapon();
        
        if($myWeapon == $opponentWeapon)
        {
            return 0;
        }
        if($myWeapon == 'rock'){
            if($opponentWeapon == 'scissors'){
                return 1;
            }
            else{
                return -1;
            }
        }
        if($myWeapon == 'scissors'){
            if($opponentWeapon == 'paper'){
                return 1;
            }
            else{
                return -1;
            }
        }
        if($myWeapon == 'paper'){
            if($opponentWeapon == 'rock'){
                return 1;
            }
            else{
                return -1;
            }
        }
    }
    
    
}

?>

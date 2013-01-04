<?php

namespace Model;
use Util\DB as DB;

/**
 * Description of Game
 *
 * @author beneppel
 */
class Game {
    
    
    public function playComputer(Choice $choice){
        $computerChoice = new Choice();
        $result = $choice->compare($computerChoice);
        
        if($result == 0){
            return 'It\'s a draw - nobody wins.';
        }
        elseif($result == 1){
            return 'You win!';
        }
        else{
            return 'Computer wins!';
        }
        
    }
    
    public function playFriend(Choice $choice, $name, $friendName){
        $db = DB::getInstance();
        $hash = uniqid();
        
        $sql = 'INSERT INTO game (player1, player1Choice, player2, gameHash) 
                VALUES(?,?,?,?)';
        
        $parameters = array($name, $choice->getWeapon(), $friendName, $hash);
        
        $db->query($sql, $parameters);
        $id = $db->getLastInsertID();
        
        return array('hash' => $hash, 'id' => $id);
        
    }
    
    public function retrieveGame($id, $hash){
        $db = DB::getInstance();
        
        $sql = 'SELECT * FROM game WHERE id = ? and gameHash = ?';
        
        $parameters = array($id, $hash);
        
        return $db->fetchOne($sql, $parameters);
        
    }
    
    public function completeChallenge(Choice $choice, $id, $hash){
        $db = DB::getInstance();
        
        $game = $this->retrieveGame($id, $hash);
        if(is_array($game)){
            $sql = 'UPDATE game SET player2Choice = ? WHERE id = ?';
            $db->query($sql, array($choice->getWeapon(),$id));
        }
    }
    
    public function getResult($id, $hash){
        $game = $this->retrieveGame($id, $hash);
        
        $player1Choice = new Choice($game['player1Choice']);
        $player2Choice = new Choice($game['player2Choice']);
        
        $result = $player1Choice->compare($player2Choice);
        if($result == 0){
            return 'It\'s a draw - nobody wins.';
        }
        elseif($result == 1){
            return $game['player1'].' wins!';
        }
        else{
            return $game['player2'].' wins!';
        }
        
    }

}

?>

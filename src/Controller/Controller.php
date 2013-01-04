<?php

namespace Controller;

use Util\HttpRequest as HttpRequest;
use Model\Choice as Choice;
use Model\Game as Game;

/**
 * This file could do with some refactoring - the view handling is 
 * very basic (a propper view class would be good!) and I'd like to have a 
 * super class that provides general functionality if multiple controllers 
 * were to exist
 *
 * @author beneppel
 */
class Controller {

    public function indexAction(HttpRequest $request) {
        
        if($request->isMethod('post'))
        {
            $choice = new Choice($request->get('choice'));
            $game = new Game();
            
            if($request->get('opponent') == 'computer'){
                
                $params['result'] = $game->playComputer($choice);
                
                return $this->render('result', $params);
            }
            else{
                
                $name = $request->get('player1');
                $friendName = $request->get('player2');
                
                $game_vals = $game->playFriend($choice, $name, $friendName);
                
                $params['link'] = 'http://'.$request->getHeader('HTTP_HOST').'/challenge?id='.$game_vals['id'].'&hash='.$game_vals['hash'];
                
                return $this->render('sendChallenge', $params);
            }
            
        }
        
        return $this->render('index', array());
    }
    
    public function challengeAction(HttpRequest $request)
    {
        $hash = $request->get('hash');
        $id = $request->get('id');
        $game = new Game();
        $params = $game->retrieveGame($id, $hash);
        
        if(!empty($params['player2Choice'])){
            $params['result'] = $game->getResult($id, $hash);
            return $this->render('result', $params);
        }
        
        if($request->isMethod('POST')){
            $choice = new Choice($request->get('choice'));
            $game->completeChallenge($choice, $id, $hash);
            
            $params['result'] = $game->getResult($id, $hash);
            return $this->render('result', $params);
            
        }
        return $this->render('challenge', $params);
    }
    
    

    protected function render($template, $params) {

        $path_to_views = DOCUMENT_ROOT . '/src/view/';
        if (file_exists($path_to_views)) {
            ob_start();
            include $path_to_views . $template . '.php';
            $html = ob_get_contents();
            ob_clean();
            return $html;
        } else {
            throw new \Exception('View file not found ' . $path_to_views . $template . '.php');
        }
    }

}

?>

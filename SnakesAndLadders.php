<?php
require('Player.php');

$action = isset($argv[1]) ? $argv[1] : null;
$param = isset($argv[2]) ? $argv[2] : null;

if($action){
    if($action == 'newGame'){
        if($param){
            $player = new Player();
            $player->newGame($param);
            var_dump($player);
        }else{
            error("You must enter the player's name");
        }
    }else{
        $player = new Player();
        if($player->loadData()){
            switch($action){
                case 'move' : movePlayer($player, $param);break;
                case 'setPosition' : setPosition($player, $param);break;
                case 'rollDice' : rollDice($player, $param);break;
            }
        }else{
            error("Must start a game first");
        }
    }
}else{
    error('You must indicate the action you want to do');
}

function movePlayer($player, $param){
    if($param && is_numeric($param)){
        $player->move($param);
        var_dump($player);
    }else{
        error('You must enter the value of the movement');
    }
}

function setPosition($player, $param){
    if($param && is_numeric($param) && $param>0 && $param<100){
        $player->setPosition($param);
        var_dump($player);
    }else{
        error('You must enter a valid position');
    }
}

function rollDice($player, $param){
    if($param && is_numeric($param) && $param >= 1 && $param <= 6){
        $result = intval($param);
    }else{
        $result = $player->rollDice();
    }
    $player->move($result, 'dice');
    var_dump(['dice' => $result]);
    var_dump($player);
}

function error($message){
    $data = [
        'status' => 'fail',
        'message' => $message
    ];
    var_dump($data);
}
<?php
require('Events.php');

class Player {

  // Properties
  private $status;
  private $name;
  private $position;
  private $historical;

  // Functions
  public function newGame($param){
    
    $this->status = 'Playing';
    $this->name = $param;
    $this->position = 1;
    $this->historical = [];
     
    $this->save();
  }

  public function loadData(){

    if(file_exists('data.txt')){
      
      $file = fopen("data.txt", "r");
      $data = json_decode(fgets($file), true);
      fclose($file);

      if(isset($data['status']) && isset($data['name']) && isset($data['position']) && isset($data['historical'])){ 
        $this->status = $data['status'];
        $this->name = $data['name'];
        $this->position = $data['position'];
        $this->historical = $data['historical'];
        
        return true;
      }else{
          return false;
      }
    }else{
      return false;
    }
  }

  public function move($param, $origin = 'move'){
      
    $new_position = $this->position + intval($param);

    if($new_position == 100){
        $this->status = 'Winner';  
        $this->position = $new_position;
        $this->historical[] = [
            'position' => $new_position,
            'origin' => $origin
        ];
        $this->save();
    }else if($new_position < 100){
        $this->position = $new_position;
        $this->historical[] = [
            'position' => $new_position,
            'origin' => $origin
        ];

        $event = new Events();
        $info = $event->exist($new_position);
        if($info['exist']){
          $this->position = $info['to'];
          $this->historical[] = [
              'position' => $info['to'],
              'origin' => $info['types']
          ];
        }
       
        $this->save();
    }

    
  }

  public function setPosition($param){
    if($this->position != 100){
      $this->position = $param;
      $this->historical[] = [
        'position' => $param,
        'origin' => 'setPosition'
      ];
      $this->save();
    }
  }

  public function rollDice(){
    return rand(1, 6);
  }

  protected function save(){
    
    $data = [
      'status' => $this->status,
      'name' => $this->name,
      'position' => $this->position,
      'historical' => $this->historical
    ];
    
    $file = fopen("data.txt", "w");
    fwrite($file, json_encode($data));
    fclose($file);
  }
}
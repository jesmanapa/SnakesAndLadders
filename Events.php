<?php

class Events {

    // Properties
    private $events = [
        2 => ['to' => 38, 'types' => 'ladder'],
        7 => ['to' => 14, 'types' => 'ladder'],
        8 => ['to' => 31, 'types' => 'ladder'],
        15 => ['to' => 26, 'types' => 'ladder'],
        16 => ['to' => 6, 'types' => 'snake'],
        36 => ['to' => 44, 'types' => 'ladder'],
        46 => ['to' => 25, 'types' => 'snake'],
        49 => ['to' => 11, 'types' => 'snake'],
        51 => ['to' => 67, 'types' => 'ladder'],
        62 => ['to' => 19, 'types' => 'snake'],
        64 => ['to' => 60, 'types' => 'snake'],
        71 => ['to' => 91, 'types' => 'ladder'],
        74 => ['to' => 53, 'types' => 'snake'],
        78 => ['to' => 98, 'types' => 'ladder'],
        87 => ['to' => 94, 'types' => 'ladder'],
        89 => ['to' => 68, 'types' => 'snake'],
        92 => ['to' => 88, 'types' => 'snake'],
        95 => ['to' => 75, 'types' => 'snake'],
        99 => ['to' => 80, 'types' => 'snake']
    ];

    // Functions
    public function exist($position){
        if(isset($this->events[$position])){
            $info = [
                'exist' => true,
                'to' => $this->events[$position]['to'],
                'types' => $this->events[$position]['types']
            ];
        }else{
            $info = [
                'exist' => false
            ];
        }
        return $info;
    }
}
<?php

namespace Ss\Card;

class Card {
    
    public $id;
    public $db;

    private $table = "ss_card";

     function __construct($id=0){
         global $db;
         $this->id  = $id;
         $this->db  = $db;
     }

     function cardArray() {
        $cardArr = $this->db->select("ss_card","*", "where status = 1 order by add_time desc");
        return $cardArr;
     }

     /**
      * 0 月卡，1 季度卡，2 半年卡 ，5 流量卡（20GB）
      * 6 流量卡（50GB），7 流量卡（100GB）, 8 流量卡（200GB）
      */
     function newCard($type = 0) {
        $cardStr = \Ss\Etc\Comm::get_random_char(10) + \Ss\Etc\Comm::get_random_char(10) + $type;

        $this->db->insert($this->table,[
                "card" => cardStr,
                "add_time" => time(),
                "type" => $type,
                "status" => 1
            ]);
     }

     function queryCard($card) {
        $cardObj = $this->db->select("ss_card","*", "where status = 1 and card=" + $card);
        return $cardObj;
     }

     function destroyCard($card) {
         return $this->db->update($this->table,[
             "status" => 0
         ],[
             "card" => $card
         ]);
     }

     function deleteCard() {
         $this->db->delete($this->table,[
             "id" => $this->id
         ]);
         return 1;
     }

     function updateCard($card, $add_time, $type, $status) {
         return $this->db->update($this->table,[
             "card" => $card,
             "add_time" => $add_time,
             "type" => $type,
             "status" => $status
         ],[
             "id" => $this->id
         ]);
     }
}
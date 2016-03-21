<?php

namespace Ss\Message;

class Message {

	 public  $id;
     public  $db;

     function __construct($id=0){
         global $db;
         $this->id  = $id;
         $this->db  = $db;
     }

	function MessageArray(){
         $msg_array = $this->db->select("ss_msg","*", "where enable=1 order by pid desc");
         return $msg_array;
    }

    // --TODO 成为我的rbq把 骚年！- 2016-03-21 t, next time.... long time
    function addMessage(){

    }

    function editMessage(){

    }

    function deleteMessage(){

    }

}
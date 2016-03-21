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

}
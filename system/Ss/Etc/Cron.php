<?php

namespace Ss\Etc;

class Cron {
     public  $uid;
     private $db;

     private $table = "ss_cron";

     function __construct($id=0){
         global $db;
         $this->id = $uid;
         $this->db  = $db;
     }
     
     function getRun(){
        $datas = $this->db->select($this->table,"*", "where 1=1 order by id desc");
        return $datas;
     }
     
}
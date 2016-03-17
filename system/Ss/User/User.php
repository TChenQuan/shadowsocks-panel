<?php


namespace Ss\User;


 class User {

     public  $uid;
     private $db;

     private $table = "user";

     function __construct($uid=0){
         global $db;
         $this->uid = $uid;
         $this->db  = $db;
     }

     function AllUser(){
        $datas = $this->db->select($this->table,"*", "where 1=1 order by uid desc");
        return $datas;
     }
     
     function AllUserByPayInfo(){
        $datas = $this->db->select($this->table,"*", "where 1=1 and remark!='' and remark!='测试用户' order by uid desc");
        return $datas;
     }
     
     function AllUserByTest(){
        $datas = $this->db->select($this->table,"*", "where 1=1 and remark='测试用户' order by uid desc");
        return $datas;
     }
     
     function AllUserByFree(){
        $datas = $this->db->select($this->table,"*", "where 1=1 and remark ='' order by plan desc");
        return $datas;
     }
     
    function AllUserByOuttime($outtime){
        $datas = $this->db->select($this->table,"*", "where 1=1 and expire_date<=".$outtime." order by uid desc");
        return $datas;
    }
    
    function AllUserByIntime($intime){
        $datas = $this->db->select($this->table,"*", "where expire_date>".$intime." and switch=0 and enable=0 order by uid desc");
        return $datas;
    }
    
     function updateUser($name,$email,$passwd,$plan,$transfer_enable,$invite_num,$paytime,$expire_date,$remark){
         return $this->db->update($this->table,[
             "user_name" => $name,
             "email" => $email,
             "passwd" => $passwd,
             "plan" => $plan,
             "transfer_enable" => $transfer_enable,
             "invite_num" => $invite_num,
             "paytime" => $paytime,
             "expire_date" => $expire_date,
             "remark" => $remark
         ],[
             "uid" => $this->uid
         ]);
     }

     //del user
     function del(){
         $this->db->delete("user",[
             "uid" => $this->uid
         ]);
         return 1;
     }

     //获取 临时 temp $pass
     function get_temp_pass(){
         $a = rand(10000,99999);
         return $a;
     }

     //判断username是否可用
     //可用,用户名不存在返回1
     function is_username_used($username){
         if($this->db->has("user",[
             "user_name" => $username
         ])){
             //用户名不可用
             return 0;
         }else{
             //用户名可用
             return 1;
         }
     }

     //is email used
     function is_email_used($email){
         if($this->db->has("user",[
             "email" => $email
         ])){
             return 0;
         }else{
             return 1;
         }
     }

     //login check
     function login_check($username,$passwd){
         if($this->db->has("user",[
             "AND" => [
                 "OR" => [
                     "user_name" => $username,
                     "email" => $username
                 ],
                 "pass" => $passwd
             ]
         ])){
             return 1;
         }else{
             return 0;
         }
     }

     //根据用户名返回UID
     function get_user_uid($username){
         $datas = $this->db->select("user","*", [
             "OR" => [
                 "user_name" => $username,
                 "email" => $username
             ],
             "LIMIT" => 1
         ]);
         return $datas['0']['uid'];
     }

     function UpdatePWd($pwd){
         $this->db->update("user",[
            "pass" => md5($pwd)
         ],[
             "uid" => $this->uid
         ]);
     }

 }

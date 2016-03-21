<?php

namespace Ss\User;


class UserInfo {

    public  $uid;
    private $db;

    private $table = "user";

    function __construct($uid=0){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
    }

    //user info array
    function UserArray(){
        $datas = $this->db->select($this->table,"*",[
            "uid" => $this->uid,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }

    function GetPasswd(){
        return $this->UserArray()['pass'];
    }
    
    function GetTransferEnable(){
        return $this->UserArray()['transfer_enable'];
    }
    
    function GetEmail(){
        return $this->UserArray()['email'];
    }

    function GetUserName(){
        return $this->UserArray()['user_name'];
    }

    function RegDate(){
        return $this->UserArray()['reg_date'];
    }

    function RegDateUnixTime(){
        return strtotime($this->RegDate());
    }
    
    function ExpireDate(){
        return $this->UserArray()['expire_date'];
    }
    
    function CheckExpireDate(){
        $data = $this->db->select($this->table,"*", "where expire_date>".$intime." and switch=0 and enable=0 and uid=".$this->uid." order by uid desc");
        return $data;
    }
    
    function PayDate(){
        return $this->UserArray()['paytime'];
    }

    function InviteNum(){
        return $this->UserArray()['invite_num'];
    }

    function InviteNumToZero(){
        $this->db->update("user",[
            "invite_num" => '0'
        ],[
            "uid" => $this->uid
        ]);
    }

    function updatePayDate($payTime, $expire_date, $type){
        $this->db->update("user",[
                "paytime" => $payTime,
                "expire_date[+]" => $expire_date,
                "remark" => "付费用户(" + $type + ")"
            ],[
                "uid" => $this->uid
            ]);
    }

    function updateFlowAndTime($payTime, $transfer_enable, $type){
        $this->db->update("user",[
                "paytime" => $payTime,
                "expire_date" => 2145888000,
                "transfer_enable" => $transfer_enable,
                "remark" => "付费用户(" + $type + ")"
            ],[
                "uid" => $this->uid
            ]);
    }

    function Money(){
        return $this->UserArray()['money'];
    }

    function AddInviteNum($invite_num){
        $this->db->update("user",[
            "invite_num[+]" => $invite_num
        ],[
            "uid" => $this->uid
        ]);
    }

    function AddMoney($money){
        $this->db->update("user",[
            "money[+]" => $money
        ],[
            "uid" => $this->uid
        ]);
    }

    function GetRefCount(){
        $c = $this->db->count($this->table,"uid",[
            "ref_by" => $this->uid
        ]);
        return $c;
    }

    function UpdatePwd($pass){
        $this->db->update("user",[
            "pass" => $pass
        ],[
            "uid" => $this->uid
        ]);
    }
    
    function UpdatePlan($plan){
        $this->db->update("user",[
         "plan" => $plan
        ],[
         "uid" => $this->uid
        ]);
    }
    
    function UpdateNickName($nickname){
        $this->db->update("user",[
            "user_name" => $nickname
        ],[
            "uid" => $this->uid
        ]);
    }
    
    function StopUser(){
        $this->db->update("user",[
                "enable" => "0",
                "switch" => "0"
            ],[
                "uid" => $this->uid
            ]);
    }
    
    function OpenUser(){
        $this->db->update("user",[
                "enable" => "1",
                "switch" => "1"
            ],[
                "uid" => $this->uid
            ]);
    }
    function UpdateTransferEnable($liuliang){
        $this->db->update("user",[
         "transfer_enable" => $liuliang
        ],[
         "uid" => $this->uid
        ]);
    }
    function isAdmin(){
        if($this->db->has("ss_user_admin",[
            "uid" => $this->uid
        ])){
            return true;
        }else{
            return false;
        }
    }

    function DelMe(){
        $this->db->delete($this->table,[
            "uid" => $this->uid
        ]);
    }
}
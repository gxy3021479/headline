<?php
include "../core/db.php";
class wechart extends db{
    public function speed(){
        $speed=$this->pdo->query("select * from wechart")->fetchAll();
        echo json_encode($speed);
    }
    public function insert(){
        if(isset($_GET['u'])){
            $img = $_GET['u'];

        }else{
            $img = 'http://bpic.588ku.com/back_pic/05/64/65/365b68056a7bf4b.jpg!r850/fw/800;http://bpic.588ku.com/back_pic/05/64/65/365b68056a7bf4b.jpg!r850/fw/800';
        }
        $sql='insert into wechart (users_name,user_avator,content,publish_time,publish_adresss,url)values(?,?,?,?,?,?)';
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(1,$_GET['users_name']);
        $stmt->bindValue(2,$_GET['user_avator']);
        $stmt->bindValue(3,$_GET['content']);
        $stmt->bindValue(4,'2018-09-11 22:22');
        $stmt->bindValue(5,'学府街开通大厦');
        $stmt->bindValue(6,$img);
        echo $stmt->execute();
    }
}

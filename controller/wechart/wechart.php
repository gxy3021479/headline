<?php
include "../core/db.php";
function https_request($url,$data=""){
    // 开启curl
    $ch=curl_init();
    // 设置传输选项
    // 设置传输地址
    curl_setopt($ch, CURLOPT_URL, $url);
    // 以文件流的形式返回
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    /**/
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书下同
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);


    if ($data) {
        // 以post方式
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    $headers = array("Content-type: application/json;charset=UTF-8","Accept: application/json","Cache-Control: no-cache", "Pragma: no-cache");

    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

    // 发送curl
    $request=curl_exec($ch);
    $tmpArr=json_decode($request,TRUE);
    if (is_array($tmpArr)) {
        return $tmpArr;
    }else{
        return $request;
    }
    // 关闭资源
    curl_close($ch);
}


class wechart extends db{
    public function user_feed(){
        $openid = $_GET['openid'];
        $page = (int)$_GET['page'];
        $sql = 'select * from wechart where openid = "'.$openid.'" order by ctime desc limit 10 offset '.($page - 1) * 10;
        $user_feed = $this->pdo->query($sql)->fetchAll();
        echo json_encode($user_feed);
    }
    public function speed()
    {
        $page=(int)$_GET['page'];
        $sql='select * from wechart order by ctime desc limit 2 offset ' . ($page-1)*2;
        $speed=$this->pdo->query($sql)->fetchAll();
        echo json_encode($speed);
    }
    public function insert(){
//        if(isset($_GET['u'])){
//            $img = $_GET['u'];
//
//        }else{
//            $img = 'http://bpic.588ku.com/back_pic/05/64/65/365b68056a7bf4b.jpg!r850/fw/800;http://bpic.588ku.com/back_pic/05/64/65/365b68056a7bf4b.jpg!r850/fw/800';
//        }


        $url='https://api.weixin.qq.com/sns/jscode2session?appid=wx35f608c755b31456&secret=150dbf92891ee959cd7ebb5bcfb1611d&js_code='.$_GET['code'].'&grant_type=authorization_code';
        $result = https_request($url);
        $openid = $result['openid'];


        $sql='insert into wechart (openid,users_name,user_avator,content,publish_adresss,latitude,longitude,url)values(?,?,?,?,?,?,?,?)';
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(1,$openid);
        $stmt->bindValue(2,$_GET['users_name']);
        $stmt->bindValue(3,$_GET['user_avator']);
        $stmt->bindValue(4,$_GET['content']);
        $stmt->bindValue(5,$_GET['address']);
        $stmt->bindValue(6,$_GET['latitude']);
        $stmt->bindValue(7,$_GET['longitude']);
        $stmt->bindValue(8,$_GET['url']);
        $stmt->execute();
        echo $openid;
    }
    public function upload(){
        $src=$_FILES['f']['tmp_name'];
        $file_name=$_FILES['f']['name'];
        $dist='./assets/wechart/'.$file_name;
        move_uploaded_file($src,$dist);
        echo 'https://youzhan.applinzi.com/assets/wechart/'.$file_name;
    }
}
